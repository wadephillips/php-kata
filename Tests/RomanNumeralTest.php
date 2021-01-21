<?php

namespace App;

use PHPUnit\Framework\TestCase;

class RomanNumeralTest extends TestCase
{
  /** @test
   * @dataProvider numerals
   */
  public function it_generates_the_correct_roman_numeral($number, $expected)
  {
    $this->assertEquals($expected, RomanNumeral::generate($number), $number);
  }

  /** @test */
  function it_cannot_generate_a_roman_numeral_for_less_than_1()
  {
    $this->expectException(\Exception::class);
    RomanNumeral::generate(0);
  }

  /** @test */
  function it_cannot_generate_a_roman_numeral_for_more_than_3999()
  {
    $this->expectException(\Exception::class);
    RomanNumeral::generate(4000);
  }

  public function numerals()
  {
    return [
        [ 1, 'I' ],
        [ 2, 'II' ],
        [ 3, 'III' ],
        [ 4, 'IV' ],
        [ 5, 'V' ],
        [ 6, 'VI' ],
        [ 7, 'VII' ],
        [ 8, 'VIII' ],
        [ 9, 'IX' ],
        [ 10, 'X' ],
        [ 40, 'XL' ],
        [ 50, 'L' ],
        [ 90, 'XC' ],
        [ 100, 'C' ],
        [ 400, 'CD' ],
        [ 500, 'D' ],
        [ 900, 'CM' ],
        [ 1000, 'M' ],
        [ 3999, 'MMMCMXCIX' ]
    ];
  }

}
