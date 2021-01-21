<?php

namespace App;

use PHPUnit\Framework\TestCase;

class PrimesTest extends TestCase
{
  /** @test
   * @dataProvider factors
   */
  public function it_finds_prime_factors($number, $expected)
  {
    //arrange
    $factors = new Primes();
    //act

    $this->assertEquals($expected, $factors->generate($number));
    //assert
  }

  public function factors()
  {
    return [
        [ 1, [] ],
        [ 2, [ 2 ] ],
        [ 3, [ 3 ] ],
        [ 4, [ 2, 2 ] ],
        [ 5, [ 5 ] ],
        [ 6, [ 2, 3 ] ],
        [ 7, [ 7 ] ],
        [ 8, [ 2, 2, 2 ] ],
        [ 9, [ 3, 3 ] ],
        [ 10, [ 2, 5 ] ],
        [ 11, [ 11 ] ],
        [ 12, [ 2, 2, 3 ] ],
        [ 13, [ 13 ] ],
        [ 14, [ 2, 7 ] ],
        [ 15, [ 3, 5 ] ],
        [ 100, [ 2, 2, 5, 5 ] ],
//            [7, [7]],
//            [7, [7]],
    ];
  }


}
