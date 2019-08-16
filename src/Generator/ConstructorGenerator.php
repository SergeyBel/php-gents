<?php

namespace Gents\Generator;

use Gents\Format\ConstructorFormat;

class ConstructorGenerator
{
    /** @var \Gents\Analyzer\Constructor */
    private $constructor;

    /** @var \Gents\Generator\ParametersHelper */
    private $parametersHelper;


    /**
     * ConstructorGenerator constructor.
     *
     * @param \Gents\Analyzer\Constructor $constructor
     */
    public function __construct(\Gents\Analyzer\Constructor $constructor)
    {
        $this->constructor = $constructor;
        $this->parametersHelper = new ParametersHelper();
    }

    public function generateConstructorFormat():ConstructorFormat
    {
        $constructorFormat = new ConstructorFormat(
            $this->constructor->getClassName(),
            $this->constructor->getShortClassName()
        );

        [$constructorMocks, $constructorVariables, $constructorParameters] =
            $this->parametersHelper->splitParameters($this->constructor->getParameters());
        $constructorFormat->setParameters($constructorParameters)
                          ->setMocks($constructorMocks)
                          ->setProviders($constructorVariables);
        return $constructorFormat;
    }
}
