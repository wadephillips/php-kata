<?php


namespace App;

use Exception;
use function array_map;
use function array_reverse;
use function count;
use function str_split;

class RomanNumeral
{


    /**
     * @param $number
     * @return string
     * @throws Exception
     */
    public static function generate($number): string
    {
        $numeral = '';

        if ($number >= 4000 || $number <= 0) {
            throw new Exception('Sorry there are no roman numerals for your number');
        }

        //split number into array and reverse it
        $numberArray = array_reverse(array_map('intval', str_split($number)));

        for ( $i = count($numberArray); $i > 0; $i-- ) {
            if ( $i === 4 ) {
                $numeral .= self::handleDigit($numberArray[ $i - 1 ], 'M', 'M', 'M');
            }

            if ( $i === 3 ) {
                $numeral .= self::handleDigit($numberArray[ $i - 1 ], 'C', 'D', 'M');
            }

            if ( $i === 2 ) {
                $numeral .= self::handleDigit($numberArray[ $i - 1 ], 'X', 'L', 'C');
            }

            if ( $i === 1 ) {
                $numeral .= self::handleDigit($numberArray[ $i - 1 ], 'I', 'V', 'X');
            }
        }

        return $numeral;
    }

    /**
     * Adds a repeating series characters for a number like 3 (III) or 7 (II)
     * @param $number
     * @param string $numeral
     * @param string $char
     * @return string
     */
    private static function handleSmallIncrements($number, string $numeral, string $char = 'I'): string
    {
        $i = ($number % 10 > 5) ? 5 : 0;
        for ( $i; $i < $number; $i++ ) {
            $numeral .= $char;
        }
        return $numeral;
    }

    /**
     * @param mixed $number
     * @param string $numeral
     * @return string
     */
    private static function handleDigit(int $number, string $baseNumeral = 'I', string $middleNumeral = 'V', string $nextNumeral = 'X'): string
    {
        $numeral = '';
        if ( $number % 10 >= 9 ) {
            $numeral .= $nextNumeral;
        } elseif ( $number % 10 >= 4 ) {
            $numeral .= $middleNumeral;
        }
        if ( $number % 10 === 4 or $number % 10 === 9 ) {
            $numeral = $baseNumeral . $numeral;
        } elseif ( $number % 10 < 4 or ($number % 10 > 5) ) {

            $numeral = self::handleSmallIncrements($number, $numeral, $baseNumeral);

        }
        return $numeral;
    }
}
