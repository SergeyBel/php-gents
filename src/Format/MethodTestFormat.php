<?php

namespace Gents\Format;

class MethodTestFormat
{
    /** @var string */
    private $name;

    /** @var \Gents\Format\VariableFormat[] */
    private $providers;

    /** @var \Gents\Format\MockFormat[] */
    private $mocks;

    /** @var \Gents\Format\ConstructorFormat */
    private $constructor;

    /** @var CallFormat */
    private $call;

    /**
     * MethodTestFormat constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
     * @return MethodTestFormat
     */
    public function setProviders($providers)
    {
        $this->providers = $providers;
        return $this;
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
     * @return MethodTestFormat
     */
    public function setMocks($mocks)
    {
        $this->mocks = $mocks;
        return $this;
    }

    /**
     * @return \Gents\Format\ConstructorFormat
     */
    public function getConstructor(): \Gents\Format\ConstructorFormat
    {
        return $this->constructor;
    }

    /**
     * @param \Gents\Format\ConstructorFormat $constructor
     *
     * @return MethodTestFormat
     */
    public function setConstructor($constructor)
    {
        $this->constructor = $constructor;
        return $this;
    }

    /**
     * @return \Gents\Format\CallFormat
     */
    public function getCall(): \Gents\Format\CallFormat
    {
        return $this->call;
    }

    /**
     * @param \Gents\Format\CallFormat $call
     *
     * @return MethodTestFormat
     */
    public function setCall($call)
    {
        $this->call = $call;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
