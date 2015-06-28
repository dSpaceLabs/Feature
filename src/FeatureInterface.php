<?php

namespace Dspacelabs\Component\Feature;

use Ruler\Context;
use Ruler\Rule;

/**
 * Feature
 */
interface FeatureInterface
{
    /**
     * Evaluate the rules with the given context
     *
     * @return boolean
     */
    public function isEnabled();

    /**
     * @return boolean
     */
    public function isDisabled();

    /**
     * Returns the name of the feature
     *
     * The name of the feature MUST be unique and should only be an
     * alphanumeric string. It MAY contain periods as well.
     *
     * @return string
     */
    public function getName();

    /**
     * Adds rule to the set of rules to evaluate
     *
     * @param \Ruler\Rule $rule
     */
    public function setRule(Rule $rule);

    /**
     * @param \Ruler\Context $context
     */
    public function setContext(Context $context);
}
