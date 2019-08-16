<?php

namespace Gents\Format;

class TestFormat
{
    /** @var string */
    private $className;

    /** @var string */
    private $shortClassName;

    /** @var string[] */
    private $uses;

    /** @var \Gents\Format\MethodTestFormat[] */
    private $methodsTests;

    /**
     * TestFormat constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }

    /**
     * @param string $shortClassName
     *
     * @return TestFormat
     */
    public function setShortClassName($shortClassName)
    {
        $this->shortClassName = $shortClassName;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getUses(): array
    {
        return $this->uses;
    }

    /**
     * @param string[] $uses
     *
     * @return TestFormat
     */
    public function setUses($uses)
    {
        $this->uses = $uses;
        return $this;
    }

    /**
     * @return \Gents\Format\MethodTestFormat[]
     */
    public function getMethodsTests(): array
    {
        return $this->methodsTests;
    }

    /**
     * @param \Gents\Format\MethodTestFormat[] $methodsTests
     *
     * @return TestFormat
     */
    public function setMethodsTests($methodsTests)
    {
        $this->methodsTests = $methodsTests;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }
}
