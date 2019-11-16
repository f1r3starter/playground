<?php

class HeapHop
{
    private $a = [];
    private $c = 0;

    public function insert(int $val): void
    {
        $this->c++;
        $this->a[$this->c] = $val;
        $this->swim($this->c);
    }

    private function swim($i): void
    {
        while ($i > 1 && $this->a[$i] < $this->a[$i / 2]) {
            [$this->a[$i], $this->a[$i / 2]] = [$this->a[$i / 2], $this->a[$i]];
            $i /= 2;
        }
    }

    public function delete(int $val): void
    {
        $se = -1;
        foreach ($this->a as $in => $el) {
            if ($el === $val) {
                $se = $in;
                break;
            }
        }
        if ($se >= 0) {
            [$this->a[$se], $this->a[$this->c]] = [$this->a[$this->c], $this->a[$se]];
            $this->c--;
            $se === 1 || $this->a[$se] > $this->a[$se / 2] ? $this->sink($se) : $this->swim($se);
            $this->a[$this->c + 1] = -1;
        }
    }

    private function sink($i): void
    {
        while ($this->c >= 2 * $i) {
            $j = 2 * $i;
            if ($j < $this->c && $this->a[$j + 1] < $this->a[$j]) {
                ++$j;
            }
            if ($this->a[$i] < $this->a[$j]) {
                break;
            }

            [$this->a[$i], $this->a[$j]] = [$this->a[$j], $this->a[$i]];
            $i = $j;
        }
    }

    public function getMin(): int
    {
        return $this->a[1];
    }
}

$fptr = fopen("php://stdout", 'wb');

$stdin = fopen("php://stdin", 'rb');

fscanf($stdin, "%d\n", $q);

$res = [];
$calc = new HeapHop();

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $command = explode(" ", fgets($stdin));
    array_walk($command, 'intval');

    switch ($command[0]) {
        case 1:
            $calc->insert((int)$command[1]);
            break;
        case 2:
            $calc->delete((int)$command[1]);
            break;
        case 3:
            echo $calc->getMin() . PHP_EOL;
            break;
    }
}
fclose($stdin);
fclose($fptr);

?>
