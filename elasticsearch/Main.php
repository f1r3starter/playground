<?php

namespace Application;

class Main
{

    private $elasticWrapper;
    private $stringProceed;
    private $indexName;
    private $readFile;
    private $fieldType;
    private $recordName;

    public function __construct(
        ElasticClient $elasticWrapper,
        StringProceeder $stringProceed,
        string $indexName,
        string $fileName,
        string $fieldType,
        string $recordName
    )
    {
        try {
            $this->readFile = new FileProceeder($fileName);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        $this->elasticWrapper = $elasticWrapper;
        $this->stringProceed = $stringProceed;
        $this->indexName = $indexName;
        $this->fieldType = $fieldType;
        $this->recordName = $recordName;
    }

    public function init()
    {
        $this->elasticWrapper->createIndex($this->indexName);

        foreach ($this->readFile->readFile() as $line) {
            $this->elasticWrapper->addRecord($this->indexName, $this->fieldType, [$this->recordName => $this->stringProceed->clearString($line)]);
        }
    }

    public function proceed(
        string $fileToWriteName
    )
    {
        try {
            $fileToWrite = new FileProceeder($fileToWriteName, 'w+');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        foreach ($this->readFile->readFile() as $line) {
            $word = $this->stringProceed->clearString($line);
            $fakeLength = $matchesFound = 0;
            while (strlen($word) > $fakeLength) {
                $matched = false;
                $response = $this->elasticWrapper->findRecord(
                    $this->indexName,
                    $this->fieldType,
                    [
                        'query' => [
                            'fuzzy' => [
                                $this->recordName => $this->stringProceed->fakeWord($word, $fakeLength)
                            ]
                        ]
                    ]
                );
                ++$fakeLength;
                foreach ($response['hits']['hits'] as $record) {
                    if ($record['_source'][$this->recordName] === $word) {
                        $matched = true;
                        ++$matchesFound;
                        break;
                    }
                }
                if (!$matched) {
                    break;
                }
            }
            $fileToWrite->writeCsvToFile([$word, $matchesFound]);
        }
    }
}