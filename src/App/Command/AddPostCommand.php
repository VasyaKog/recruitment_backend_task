<?php

declare(strict_types=1);

namespace App\Command;

use Domain\Post\PostManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddPostCommand extends Command
{
    private const ARGUMENT_TITLE = 'title';
    private const ARGUMENT_CONTENT = 'content';
    protected static $defaultName = 'app:post:add';
    protected static $defaultDescription = 'Add post with parameters';

    private PostManager $postManager;

    public function __construct(PostManager $postManager, string $name = null)
    {
        parent::__construct($name);

        $this->postManager = $postManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument(
                self::ARGUMENT_TITLE,
                InputArgument::REQUIRED,
            )
            ->addArgument(
                self::ARGUMENT_CONTENT,
                InputArgument::REQUIRED,
            )
        ;
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $title = $input->getArgument(self::ARGUMENT_TITLE);
        $content = $input->getArgument(self::ARGUMENT_CONTENT);

        $this
            ->postManager
            ->addPost(
                $title,
                $content,
            )
        ;

        $output->writeln('The post has been added.');

        return Command::SUCCESS;
    }
}
