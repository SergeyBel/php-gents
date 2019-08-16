<?php

namespace Gents\Printer\PhpunitPrinter;

use Gents\Format\TestFormat;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PhpunitPrinter
{
    private $twig;

    private $test;

    public function __construct(TestFormat $test)
    {
        $this->test = $test;
        $loader = new FilesystemLoader(__DIR__.'/templates');
        $this->twig = new Environment($loader, ['cache' => false]);
    }

    public function printTest()
    {
        return $this->twig->render(
            'test.twig',
            [
                'test' => $this->test,
            ]
        );
    }

}
