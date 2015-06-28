<?php
/**
 */

namespace Dspacelabs\Component\Feature\Operator;

use Ruler\Context;
use Ruler\Value;
use Ruler\VariableOperand;
use Ruler\Operator\VariableOperator;
use Ruler\Proposition;

/**
 */
class Enabled extends VariableOperator implements Proposition
{
    public function prepareValue(Context $context)
    {
        return new Value(true);
    }

    protected function getOperandCardinality()
    {
        return static::UNARY;
    }

    public function evaluate(Context $context)
    {
        return true;
    }
}
