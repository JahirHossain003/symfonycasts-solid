<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\BigFootSightingScore;
use App\Scoring\AdjustFinalScoreInterface;
use App\Scoring\ScoringFactorInterface;

class SightingScorer
{

    /**
     * @var ScoringFactorInterface[]
     */
    private iterable $scoringFactors;

    /**
     * @var AdjustFinalScoreInterface[]
     */
    private iterable $adjustFinalScores;

    public function __construct(iterable $scoringFactors, iterable $adjustFinalScores)
    {
        $this->scoringFactors = $scoringFactors;
        $this->adjustFinalScores = $adjustFinalScores;
    }

    public function score(BigFootSighting $sighting): BigFootSightingScore
    {
        $score = 0;

        foreach ($this->scoringFactors as $scoringFactor) {
            $score += $scoringFactor->score($sighting);
        }

        foreach ($this->adjustFinalScores as $adjustFinalScore) {
            $score = $adjustFinalScore->adjustScore($score, $sighting);
        }

        return new BigFootSightingScore($score);
    }
}
