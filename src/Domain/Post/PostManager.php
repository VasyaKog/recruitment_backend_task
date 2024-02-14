<?php

declare(strict_types=1);

namespace Domain\Post;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class PostManager
{
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function addPost(
        string $title,
        string $content
    ): Post {
        $post = new Post();

        $post->setTitle($title);
        $post->setContent($content);

        $this->em->persist($post);
        $this->em->flush();

        return $post;
    }
}
