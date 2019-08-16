<?php

namespace Gents\Analyzer\Visitor;

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;

class AstAnalyzer
{
    private $ast;

    public function __construct(string $filename)
    {
        $code = $this->getMethodSourceCode($filename);
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $this->ast = $parser->parse($code);
    }

    public function getUsedCalls(string $methodName)
    {
        $traverser = new NodeTraverser();
        $v = new MethodUsedCallVisitor($methodName);
        $traverser->addVisitor($v);
        $traverser->traverse($this->ast);
        return $v->getMethodCalls();
    }

    public function exploreConstructorEquals(array $parameters)
    {
        $traverser = new NodeTraverser();
        $v = new ConstructorParametersMappingVisitor();
        $traverser->addVisitor($v);
        $traverser->traverse($this->ast);
        $mapping = $v->getMapping();
        foreach($parameters as $param) {
            if (array_key_exists($param->getName(), $mapping)) {
                $param->setName($mapping[$param->getName()]);
            }
        }

        return $parameters;
    }

    private function getMethodSourceCode(string $filename)
    {
        $body = file_get_contents($filename);
        return $body;
    }

}
