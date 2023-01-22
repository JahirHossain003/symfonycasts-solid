<?php

namespace App\Service;

use App\Comment\SpamWordCounterInterface;

class SpamWordHelper implements SpamWordCounterInterface
{
    private function getBadWords(string $content): array
    {

        $badWordsOnComment = [];

        $regex = implode('|', $this->spamWords());

        preg_match_all("/$regex/i", $content, $badWordsOnComment);

        return $badWordsOnComment[0];
    }

    private function spamWords(): array
    {
        return [
            'follow me',
            'twitter',
            'facebook',
            'earn money',
            'SymfonyCats',
        ];
    }

    public function countBadWords(string $content): int
    {
        return count($this->getBadWords($content));
    }
}