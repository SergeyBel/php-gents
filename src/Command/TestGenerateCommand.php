<?php

namespace Gents\Command;

use Gents\Printer\PhpunitPrinter\PhpunitPrinter;
use Gents\TestGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestGenerateCommand extends Command
{
    protected static $defaultName = 'generate';

    protected function configure()
    {
        $this->addOption('class', 'c', InputOption::VALUE_REQUIRED, 'Class for test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $a = new TestGenerator($input->getOption('class'));
        $t = $a->generateTest();

        $printer = new PhpunitPrinter($t);
        $output->writeln($printer->printTest());
    }
}
