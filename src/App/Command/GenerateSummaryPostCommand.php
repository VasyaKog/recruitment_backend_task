<?php

declare(strict_types=1);

namespace App\Command;

use Domain\Post\PostGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateSummaryPostCommand extends Command
{
    protected static $defaultName = 'app:post:summary';
    protected static $defaultDescription = 'Add summary post';

    private PostGenerator $postGenerator;

    public function __construct(
        PostGenerator $postGenerator,
        string $name = null
    ) {
        parent::__construct($name);

        $this->postGenerator = $postGenerator;
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $this->postGenerator->generateSummary();

        $output->writeln('A summary post has been generated.');

        return Command::SUCCESS;
    }
}
