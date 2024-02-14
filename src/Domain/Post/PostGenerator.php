<?php

declare(strict_types=1);

namespace Domain\Post;

use App\Entity\Post;
use joshtronic\LoremIpsum;

final class PostGenerator
{
    private const PARAGRAPHS_RANDOM_DEFAULT = 2;
    private const PARAGRAPHS_SUMMARY = 1;
    private PostManager $postManager;
    private LoremIpsum $loremIpsum;

    public function __construct(
        PostManager $postManager,
        LoremIpsum $loremIpsum
    ) {
        $this->postManager = $postManager;
        $this->loremIpsum = $loremIpsum;
    }

    public function generateRandom(): Post
    {
        $title = $this
            ->loremIpsum
            ->words(mt_rand(4, 6))
        ;

        return $this
            ->postManager
            ->addPost(
                $title,
                $this->getRandomContent(),
            )
        ;
    }

    public function generateSummary(): Post
    {
        $date = date('Y-m-d') ;
        $title = "Summary $date";

        return $this
            ->postManager
            ->addPost(
               $title,
               $this->getRandomContent(self::PARAGRAPHS_SUMMARY),
            )
        ;
    }

    private function getRandomContent(
        int $paragraphs = self::PARAGRAPHS_RANDOM_DEFAULT
    ): string {
        return $this
            ->loremIpsum
            ->paragraphs($paragraphs)
        ;
    }
}