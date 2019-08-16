<?php

namespace Gents\Analyzer\Visitor;

use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;

class ConstructorParametersMappingVisitor extends NodeVisitorAbstract
{
    private $mapping;

    public function enterNode(Node $node) {
        if ($node instanceof Node\Expr\Assign) {
            $var = $node->var;

            if ($var instanceof PropertyFetch && $var->var->name == 'this') {
                $expr = $node->expr;
                if ($expr instanceof Node\Expr\MethodCall) {
                    $parameterName = $node->expr->var->name;
                } else {
                    $parameterName = $node->expr->name;
                }

                $propertyName = $var->name;
                $this->mapping[$parameterName] = $propertyName;
            }
        }
    }

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\ClassMethod && $node->name == '__construct') {
            return NodeTraverser::STOP_TRAVERSAL;
        }
    }

    public function getMapping(): array
    {
        return $this->mapping;
    }
}