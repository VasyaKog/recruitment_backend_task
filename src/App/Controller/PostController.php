<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class PostController extends AbstractController
{
    private PostRepository $postRepository;

    public function __construct(
        PostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/", name="app_post_index")
     */
    public function index(): Response
    {
        $posts = $this
            ->postRepository
            ->findBy(
                [],
                ['id' => 'desc'],
                100,
            );

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/{id}", name="app_post_show")
     */
    public function show($id): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $this->postRepository->find($id),
        ]);
    }
}
