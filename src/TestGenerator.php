<?php

namespace Gents;

use Gents\Analyzer\Analyzer;
use Gents\Format\TestFormat;
use Gents\Generator\ConstructorGenerator;
use Gents\Generator\MethodTestGenerator;
use Gents\Generator\MockHelper;

class TestGenerator
{
    private $analyzer;

    private $methods;

    /** @var \Gents\Generator\MockHelper */
    private $mockHelper;


    public function __construct(string $className, array $methods = null)
    {
        $this->analyzer = new Analyzer($className);
        $this->methods = $this->filterMethods($methods);
        $this->mockHelper = new MockHelper();
    }

    public function generateTest(): TestFormat
    {
        $methodsTests = [];

        $test = new TestFormat($this->analyzer->getClassName());
        $test->setShortClassName($this->analyzer->getShortClassName());
        $constructorGenerator = new ConstructorGenerator($this->analyzer->getConstructor());


        foreach ($this->methods as $method) {
            $constructor = $constructorGenerator->generateConstructorFormat();
            $methodTest = (new MethodTestGenerator($method))->generateMethodTest();

            $providers = array_unique(array_merge($constructor->getProviders(), $methodTest->getProviders()), SORT_REGULAR);
            $mocks = array_unique(array_merge($constructor->getMocks(), $methodTest->getMocks()), SORT_REGULAR);
            $mocks = $this->mockHelper->fillMocks($mocks, $method->getUsedCalls());

            $methodTest->setConstructor($constructor)
                       ->setMocks($mocks)
                       ->setProviders($providers);

            $methodsTests[] = $methodTest;

        }

        $test->setMethodsTests($methodsTests);

        return $test;
    }

    private function filterMethods(?array $methodNames)
    {
        if (is_null($methodNames)) {
            $methodNames = $this->analyzer->getClassPublicMethodsNames();
        }
        $filteredMethods = [];
        foreach($methodNames as $methodName) {
            $filteredMethods[] = $this->analyzer->getMethod($methodName);
        }
        return $filteredMethods;
    }
}
