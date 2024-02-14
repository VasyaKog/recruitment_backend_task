<?php

declare(strict_types=1);

namespace Domain\Post;

use App\Entity\Post;

class ReverseWordsInTitle
{
    // TODO: remove if not used in future
    public function reverseWordsInTitle(Post $post): Post
    {
        $titleWords = explode(' ', $post->getTitle());
        $reversedWords = array_reverse($titleWords);
        $newTitle = implode(' ', $reversedWords);
        $post->setTitle($newTitle);

        return $post;
    }
}
