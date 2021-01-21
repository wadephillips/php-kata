<?php

namespace App;

class Primes
{
    public function generate($number): array
    {

        $array = [];

        for ($divisor = 2; $number > 1; $divisor++ ) {
            for( ;$number % $divisor == 0; $number /= $divisor ) {
                $array[] = $divisor;
            }
        }

        return $array;
    }
}
