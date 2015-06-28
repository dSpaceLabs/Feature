<?php

namespace Dspacelabs\Component\Feature;

use Ruler\Context;
use Ruler\Rule;

/**
 * Feature
 */
class Feature implements FeatureInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Ruler\Rule
     */
    protected $rule;

    /**
     * @var \Ruler\Context
     */
    protected $context;

    /**
     * @param string $name
     * @param Rule   $rule
     */
    public function __construct($name, Rule $rule = null)
    {
        $this->name = $name;

        if (null !== $rule) {
            $this->setRule($rule);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isEnabled()
    {
        if (null === $this->rule) {
            throw new FeatureException('No Rule has been set');
        }

        if (null === $this->context) {
            throw new FeatureException('No Context has been set');
        }

        return $this->rule->evaluate($this->context);
    }

    /**
     * {@inheritDoc}
     */
    public function isDisabled()
    {
        return !$this->isEnabled();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setRule(Rule $rule)
    {
        $this->rule = $rule;
    }

    /**
     * {@inheritDoc}
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
    }
}
