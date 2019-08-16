<?php

namespace Gents\Analyzer;

class Variable
{
    /** @var string */
    private $name;

    /** @var ?string */
    private $type;

    /** @var bool */
    private $isClass;

    /**
     * Variable constructor.
     *
     * @param string $name
     * @param ?string $type
     */
    public function __construct(string $name, ?string $type, bool $isClass)
    {
        $this->name = $name;
        $this->type = $type;
        $this->isClass = $isClass;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isClass(): bool
    {
        return $this->isClass;
    }

    /**
     * @param string $name
     *
     * @return Variable
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}
