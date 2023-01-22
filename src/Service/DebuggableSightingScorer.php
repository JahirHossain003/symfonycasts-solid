<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\DebuggableBigFootSightingScore;

class DebuggableSightingScorer extends SightingScorer
{
    public function score(BigFootSighting $sighting): DebuggableBigFootSightingScore
    {
        $bfsc = parent::score($sighting);

        return new DebuggableBigFootSightingScore($bfsc->getScore(), 100);
    }
}