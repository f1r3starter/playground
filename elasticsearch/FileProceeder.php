<?php

namespace Application;

class FileProceeder
{
    private $fileResource;

    public function __construct(string $fileName, $modifier = 'r')
    {
        if (!file_exists($fileName)) {
            throw new \Exception("File $fileName doesn't exists");
        }
        $this->fileResource = new \SplFileObject($fileName, $modifier);
    }

    public function readFile(): \Generator
    {
        $this->fileResource->rewind();
        while (!$this->fileResource->eof()) {
            yield $this->fileResource->fgets();
        }
    }

    public function writeCsvToFile($data)
    {
        $this->fileResource->fputcsv($data);
    }

    public function __destruct()
    {
        $this->fileResource = null;
    }
}