<?php

namespace Gents\Format;

class VariableFormat
{
    /** @var string */
    private $name;

    /**
     * VariableFormat constructor.
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
}
