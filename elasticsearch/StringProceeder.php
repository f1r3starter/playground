<?php

namespace Application;

class StringProceeder {
    public function clearString(string $str): string
    {
        return trim(preg_replace('/\s\s+/', ' ', $str));
    }

    private function generateLetter($n)
    {
        $letter = chr(rand(97,122));
        return $letter === $n ? $this->generateLetter($n) : $letter;
    }

    public function fakeWord($word, $fakeLetters)
    {
        $newEnd = '';
        for ($i = 0; $i < $fakeLetters; $i++) {
            $newEnd .= $this->generateLetter(substr($word,-1));
            $word = substr($word, 0, -1);
        }
        $word .= strrev($newEnd);
        return $word;
    }
}