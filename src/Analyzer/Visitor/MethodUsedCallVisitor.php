<?php

namespace Gents\Analyzer\Visitor;

use Gents\Analyzer\MethodCall;
use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

class MethodUsedCallVisitor extends NodeVisitorAbstract
{
    /** @var string */
    private $methodName;

    /** @var \Gents\Analyzer\MethodCall[] */
    private $usedMethods = [];

    private $inMethod = false;

    /**
     * MethodUsedCallVisitor constructor.
     *
     * @param string $methodName
     */
    public function __construct(string $methodName)
    {
        $this->methodName = $methodName;
    }


    public function enterNode(Node $node)
    {
        if ($node instanceof Node\Stmt\ClassMethod && $node->name == $this->methodName) {
            $this->inMethod = true;
        }

        if ($this->inMethod && $node instanceof Node\Expr\MethodCall) {
            $this->usedMethods[] = new MethodCall($node->var->name, $node->name->name);
        }
    }

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\ClassMethod && $node->name == $this->methodName) {
            return NodeTraverser::STOP_TRAVERSAL;
        }
    }

    public function getMethodCalls()
    {
        return $this->usedMethods;
    }
}
