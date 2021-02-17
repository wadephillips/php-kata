<?php

namespace App;

use PHPUnit\Framework\TestCase;
use function range;

class BowlingGameTest extends TestCase
{
  /** @test */
  public function itScoresAGutterGameAsZero()
  {
    $game = new BowlingGame();

    foreach (range(1,20) as $turn) {
      $game->roll(0);
    }

    $this->assertEquals(0, $game->score());
  }
  /** @test */
  public function itScoresAOneOnEveryRollAsTwenty()
  {
    $game = new BowlingGame();

    foreach (range(1,20) as $turn) {
      $game->roll(1);
    }

    $this->assertEquals(20, $game->score());
  }

  /** @test */
  public function itAwardsAOneRollBonusForASpare()
  {
    $game = new BowlingGame();

    $game->roll(5);
    $game->roll(5);

    $game->roll(6);
    foreach (range(4,20) as $turn) {
      $game->roll(0);
    }

    $this->assertEquals(22, $game->score());
  }

  /** @test */
  public function itAwardsATwoRollBonusForAStrike()
  {
    $game = new BowlingGame();

    $game->roll(10);

    $game->roll(5);

    $game->roll(4);
    foreach (range(4,20) as $turn) {
      $game->roll(0);
    }

    $this->assertEquals(28, $game->score());
  }

  /** @test */
  public function itCorrectlyScoresAPerfectGame()
  {
    $game = new BowlingGame();

    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);
    $game->roll(10);

    foreach (range(4,20) as $turn) {
      $game->roll(0);
    }

    $this->assertEquals(300, $game->score());
  }


}
