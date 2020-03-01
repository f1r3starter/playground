<?php

namespace App\Domain;

use App\Table\Product;
use App\Table\RevenueRecognition;
use DateInterval;
use DateTime;
use InvalidArgumentException;

class CalculateRecognition
{
    private RevenueRecognition $revenueRecognition;

    public function __construct(RevenueRecognition $revenueRecognition)
    {
        $this->revenueRecognition = $revenueRecognition;
    }

    public function calculate(string $type, string $contractID, float $amount, DateTime $dateSigned): void
    {
        switch ($type) {
            case Product::TYPE_WORD:
                $this->revenueRecognition->insert($contractID, $amount, $dateSigned);
                break;
            case Product::TYPE_DATABASE:
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned);
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned->add(new DateInterval('P30D')));
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned->add(new DateInterval('P60D')));
                break;
            case Product::TYPE_SPREADSHEET:
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned);
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned->add(new DateInterval('P60D')));
                $this->revenueRecognition->insert($contractID, $amount / 3, $dateSigned->add(new DateInterval('P90D')));
                break;
            default:
                throw new InvalidArgumentException('Unrecognized product type');
        }
    }
}
