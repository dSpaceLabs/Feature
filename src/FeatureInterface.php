<?php

namespace Dspacelabs\Component\Feature;

use Ruler\Context;
use Ruler\Proposition;

/**
 * Feature
 */
interface FeatureInterface
{
    /**
     * Evaluate rules and returns the evaluation
     *
     * @throws FeatureException
     *   If a rule is not set for the feature, a FeatureException
     *   is thrown
     * @return boolean
     */
    public function isEnabled();

    /**
     * Evaluates the rules and returns true if the feature
     * is disabled, this returns the opposite of isEnabled
     *
     * @see FeatureInterface::isEnabled
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
     * @param \Ruler\Proposition $rule
     */
    public function setRule(Proposition $rule);

    /**
     * @param \Ruler\Context $context
     */
    public function setContext(Context $context);
}
