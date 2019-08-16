<?php

namespace Gents\Format;

class ConstructorFormat
{

    /** @var string */
    private $className;

    /** @var string */
    private $shortClassName;

    /** @var \Gents\Format\VariableFormat[] */
    private $parameters;

    /** @var \Gents\Format\MockFormat[] */
    private $mocks;

    /** @var \Gents\Format\VariableFormat[] */
    private $providers;

    /**
     * ConstructorFormat constructor.
     *
     * @param string $className
     */
    public function __construct(string $className, string $shortClassName)
    {
        $this->className = $className;
        $this->shortClassName = $shortClassName;
    }

    /**
     * @return \Gents\Format\VariableFormat[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param \Gents\Format\VariableFormat[] $parameters
     *
     * @return ConstructorFormat
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }

    /**
     * @return \Gents\Format\MockFormat[]
     */
    public function getMocks(): array
    {
        return $this->mocks;
    }

    /**
     * @param \Gents\Format\MockFormat[] $mocks
     *
     * @return ConstructorFormat
     */
    public function setMocks($mocks)
    {
        $this->mocks = $mocks;
        return $this;
    }

    /**
     * @return \Gents\Format\VariableFormat[]
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * @param \Gents\Format\VariableFormat[] $providers
     *
     * @return ConstructorFormat
     */
    public function setProviders($providers)
    {
        $this->providers = $providers;
        return $this;
    }

}
