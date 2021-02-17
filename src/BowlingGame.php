<?php

namespace App;

use function array_sum;
use function range;
use function var_dump;

class BowlingGame
{

  const TOTAL_FRAMES = 10;


  private $rolls = [];


  public function score(): int
  {
    //it keeps track of the score of a bowling game
    $score = 0;
    $roll = 0;
    // there are 10 frames with 21 potential rolls
    foreach (range(1, self::TOTAL_FRAMES) as $frame) {

      //if first roll is 10 award strike bonus and proceed to next iteration
      if ($this->isStrike($roll)) {
        $score += 10 + $this->awardStrikeBonus($roll);
        $roll += 2;
        continue;
      }

      $score += $this->rolls[$roll] + $this->rolls[$roll + 1];


      if ($this->isSpare($roll)){
        $score += $this->awardSpareBonus($roll);
      }
      $roll += 2;
    }
    //if first roll of a frame = 10 add the next 2 rolls to to the total score

    return $score;
  }

  public function roll(int $pins)
  {
    $this->rolls[] = $pins;
    if ($pins === 10) $this->rolls[] = 0;
  }

  private function awardSpareBonus(int $roll)
  {
    return $this->rolls[$roll+2];
  }

  private function awardStrikeBonus($roll)
  {
    return $this->rolls[$roll+2] + $this->rolls[$roll+3];
  }

  private function isSpare($roll)
  {
    return $this->rolls[$roll] + $this->rolls[$roll + 1] === 10;
  }

  private function isStrike($roll)
  {
    return $roll % 2 === 0 && $this->rolls[$roll] === 10;
  }

}