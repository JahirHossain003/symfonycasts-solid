<?php

namespace App\Model;

class DebuggableBigFootSightingScore extends BigFootSightingScore
{
    private int $executionTime;

    public function __construct(int $score, int $executionTime)
    {
        parent::__construct($score);
        $this->executionTime = $executionTime;
    }

    /**
     * @return int
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }

    /**
     * @param int $executionTime
     */
    public function setExecutionTime(int $executionTime): void
    {
        $this->executionTime = $executionTime;
    }
}