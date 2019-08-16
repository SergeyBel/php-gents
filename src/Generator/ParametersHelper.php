<?php

namespace Gents\Generator;

use Gents\Format\MockFormat;
use Gents\Format\VariableFormat;

class ParametersHelper
{
    public function splitParameters(array $parameters)
    {
        $mocks = [];
        $typesParameters = [];
        $allParameters = [];

        foreach($parameters as $parameter) {
            if ($parameter->isClass()) {
                $mocks[] = new MockFormat(
                    new VariableFormat($parameter->getName()),
                    $parameter->getType()
                );
            } else {
                $typesParameters[] = new VariableFormat($parameter->getName());
            }
            $allParameters[] = new VariableFormat($parameter->getName());
        }

        return [$mocks, $typesParameters, $allParameters];
    }

}
