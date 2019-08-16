<?php

namespace Gents\Analyzer;

class MethodCall
{
    /** @var string */
    private $propertyName;

    /** @var string */
    private $methodName;

    /**
     * MethodCall constructor.
     *
     * @param string $variable
     * @param string $methodName
     */
    public function __construct(string $variable, string $methodName)
    {
        $this->propertyName = $variable;
        $this->methodName = $methodName;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }
}
