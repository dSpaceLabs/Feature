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
     * @return boolean
     */
    public function isEnabled();

    /**
     * Returns the name of the feature
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
