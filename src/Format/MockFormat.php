<?php

namespace Gents\Format;

class MockFormat
{
    /** @var \Gents\Format\VariableFormat */
    private $variable;

    /** @var string */
    private $className;

    /** @var string */
    private $functionName;

    /**
     * MockFormat constructor.
     *
     * @param \Gents\Format\VariableFormat $variable
     * @param string                       $className
     */
    public function __construct(\Gents\Format\VariableFormat $variable, string $className)
    {
        $this->variable = $variable;
        $this->className = $className;
    }

    /**
     * @return \Gents\Format\VariableFormat
     */
    public function getVariable(): \Gents\Format\VariableFormat
    {
        return $this->variable;
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
    public function getFunctionName(): ?string
    {
        return $this->functionName;
    }

    /**
     * @param string $functionName
     *
     * @return MockFormat
     */
    public function setFunctionName($functionName)
    {
        $this->functionName = $functionName;
        return $this;
    }
}
