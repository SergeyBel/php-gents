<?php

namespace Gents\Generator;

use Gents\Format\MockFormat;

class MockHelper
{
    /**
     * @param MockFormat[] $mocks
     * @param \Gents\Analyzer\MethodCall[] $usedCalls
     */
    public function fillMocks(array $mocks, array $usedCalls)
    {
        foreach ($usedCalls as $c) {
            foreach ($mocks as $m) {
                if ($m->getVariable()->getName() == $c->getPropertyName()) {
                    $m->setFunctionName($c->getMethodName());
                }
            }
        }

        return $mocks;
    }

}
