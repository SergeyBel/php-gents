<?php

namespace Gents\Analyzer;

class Constructor
{
    /** @var string */
    private $className;

    /** @var string */
    private $shortClassName;

    /** @var \Gents\Analyzer\Variable[] */
    private $parameters;

    /**
     * Constructor constructor.
     *
     * @param string $className
     */
    public function __construct(string $className, string $shortClassName)
    {
        $this->className = $className;
        $this->shortClassName = $shortClassName;
    }


    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
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
     * @return Constructor
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortClassName(): string
    {
        return $this->shortClassName;
    }

}
