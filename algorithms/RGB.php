<?php

class RGB
{
    private const RED = 'R';
    private const GREEN = 'G';
    private const BLUE = 'B';

    /**
     * @var resource
     */
    private $stdin;

    /**
     * @var resource
     */
    private $stdout;

    /**
     * @var int
     */
    private $n;

    /**
     * @var array
     */
    private $cost = [
        [
            self::RED => 0,
            self::GREEN => 0,
            self::BLUE => 0,
        ]
    ];

    public function __construct()
    {
        $this->stdin = fopen('php://stdin', 'rb');
        $this->stdout = fopen(getenv('OUTPUT_PATH'), 'wb');
        fscanf($this->stdin, '%d\n', $this->n);
    }

    public function execute(): void
    {
        for ($i = 1; $i <= $this->n; ++$i) {
            $line = $this->readLine();
            $this->cost[$i][self::RED] = min($this->cost[$i - 1][self::GREEN], $this->cost[$i - 1][self::BLUE])
                + $line[self::RED];
            $this->cost[$i][self::GREEN] = min($this->cost[$i - 1][self::RED], $this->cost[$i - 1][self::BLUE])
                + $line[self::GREEN];
            $this->cost[$i][self::BLUE] = min($this->cost[$i - 1][self::GREEN], $this->cost[$i - 1][self::RED])
                + $line[self::BLUE];
        }

        fwrite($this->stdout, min($this->cost[$this->n]));
    }

    private function readLine(): array
    {
        fscanf($this->stdin, '%[^\n]', $arr_temp);
        $array = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

        return [
            self::RED => $array[0],
            self::GREEN => $array[1],
            self::BLUE => $array[2],
        ];
    }
}

$rgb = new RGB();
$rgb->execute();
