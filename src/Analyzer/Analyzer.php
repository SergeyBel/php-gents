<?php

namespace Gents\Analyzer;

use Gents\Analyzer\Visitor\AstAnalyzer;

class Analyzer
{
    private $class;

    private $astAnalyzer;


    public function __construct(string $className)
    {
        $this->class = new \ReflectionClass($className);
        $this->astAnalyzer = new AstAnalyzer($this->class->getFileName());
    }

    public function getConstructor(): Constructor
    {
        $constructor = new Constructor($this->getClassName(), $this->getShortClassName());
        $classConstructor = $this->class->getConstructor();
        if (!$classConstructor) {
            $constructor->setParameters([]);
        } else {
            $constructor->setParameters($this->astAnalyzer->exploreConstructorEquals($this->getMethodParameters($classConstructor)));

        }
        return $constructor;
    }


    public function getClassName(): string
    {
        return $this->class->getName();
    }

    public function getShortClassName(): string
    {
        return $this->class->getShortName();
    }

    public function getClassPublicMethodsNames()
    {
        $methodNames = [];
        foreach ($this->class->getMethods() as $method) {
            if ($method->isPublic() && $method->getName() != '__construct') {
                $methodNames[] = $method->getName();
            }
        }
        return $methodNames;
    }


    public function getMethod(string $methodName): Method
    {
        $method = new Method($methodName);
        $method->setParameters($this->getMethodParameters($this->class->getMethod($methodName)))
               ->setUsedCalls($this->astAnalyzer->getUsedCalls($methodName));
        return $method;
    }


    /**
     * @param \ReflectionMethod $method
     *
     * @return \Gents\Analyzer\Variable[]
     */
    private function getMethodParameters(\ReflectionMethod $method)
    {
        $parameters = [];
        foreach($method->getParameters() as $parameter) {
            if ($parameter->getClass()) {
                $type = $parameter->getClass()->getName();
                $isClass = true;
            } else
            {
                $type = $parameter->getType();
                $isClass = false;
            }
            $parameters[] = new Variable($parameter->getName(), $type, $isClass);
        }
        return $parameters;
    }
}

