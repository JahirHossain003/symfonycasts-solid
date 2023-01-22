<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

interface AdjustFinalScoreInterface
{
    public function adjustScore(int $score, BigFootSighting $sighting): int;
}