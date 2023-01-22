<?php

namespace App\Comment;

use App\Entity\Comment;

class CommentSpamManager
{
    private SpamWordCounterInterface $spamWordCounter;

    public function __construct(SpamWordCounterInterface $spamWordCounter)
    {
        $this->spamWordCounter = $spamWordCounter;
    }

    public function validate(Comment $comment): void
    {
        $content = $comment->getContent();
        $badWordsOnComment = $this->spamWordCounter->countBadWords($content);
        if ($badWordsOnComment >= 2) {
            // We could throw a custom exception if needed
            throw new \RuntimeException('Message detected as spam');
        }
    }
}
