<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class TitleFactor implements ScoringFactorInterface, AdjustFinalScoreInterface
{
    public function score(BigFootSighting $sighting): int
    {
        $score = 0;
        $title = strtolower($sighting->getTitle());

        if (stripos($title, 'hairy') !== false) {
            $score += 10;
        }

        if (stripos($title, 'chased me') !== false) {
            $score += 20;
        }

        return $score;
    }

    public function adjustScore(int $score, BigFootSighting $sighting): int
    {
        if (stripos($sighting->getTitle(), 'foot') !== false) {
            $score *= 5;
        }
        dump($score);
        return $score;
    }
}