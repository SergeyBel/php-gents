<?php

namespace Gents\Generator;

use Gents\Format\CallFormat;
use Gents\Format\MethodTestFormat;
use Gents\Format\VariableFormat;

class MethodTestGenerator
{
    /** @var \Gents\Analyzer\Method */
    private $method;

    private $parametersHelper;

    /**
     * MethodTestGenerator constructor.
     *
     * @param \Gents\Analyzer\Method $method
     */
    public function __construct(\Gents\Analyzer\Method $method)
    {
        $this->method = $method;
        $this->parametersHelper = new ParametersHelper();
    }


    public function generateMethodTest(): MethodTestFormat
    {
        $test = new MethodTestFormat($this->method->getName());
        $call = new CallFormat(new VariableFormat($this->method->getName()));

        [$mocks, $providers, $parameters] = $this->parametersHelper->splitParameters($this->method->getParameters());

        $call->setParameters($parameters);

        $test->setMocks($mocks)
          ->setProviders($providers)
          ->setCall($call);

        return $test;
    }
}
