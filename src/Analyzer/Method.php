<?php

namespace Gents\Analyzer;

class Method
{
    /** @var string */
    private $name;

    /** @var Variable[] */
    private $parameters = [];


    /** @var MethodCall[] */
    private $usedCalls;

    /**
     * Method constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \Gents\Analyzer\Variable[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param \Gents\Analyzer\Variable[] $parameters
     *
     * @return Method
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return \Gents\Analyzer\MethodCall[]
     */
    public function getUsedCalls(): array
    {
        return $this->usedCalls;
    }

    /**
     * @param \Gents\Analyzer\MethodCall[] $usedCalls
     *
     * @return Method
     */
    public function setUsedCalls($usedCalls)
    {
        $this->usedCalls = $usedCalls;
        return $this;
    }
}
