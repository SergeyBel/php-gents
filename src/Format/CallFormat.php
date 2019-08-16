<?php

namespace Gents\Format;

class CallFormat
{
    /** @var \Gents\Format\VariableFormat */
    private $variable;

    /** @var \Gents\Format\VariableFormat[] */
    private $parameters;

    /**
     * CallFormat constructor.
     *
     * @param \Gents\Format\VariableFormat $name
     */
    public function __construct(\Gents\Format\VariableFormat $variable)
    {
        $this->variable = $variable;
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
     * @return CallFormat
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return \Gents\Format\VariableFormat
     */
    public function getVariable(): \Gents\Format\VariableFormat
    {
        return $this->variable;
    }

}
