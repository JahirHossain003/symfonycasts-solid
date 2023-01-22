<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class MaximumScoreFactor implements AdjustFinalScoreInterface
{

    public function adjustScore(int $score, BigFootSighting $sighting): int
    {
        return min($score, 100);
    }
}