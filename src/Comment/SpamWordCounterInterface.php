<?php

namespace App\Comment;

interface SpamWordCounterInterface
{
    public function countBadWords(string $content): int;
}