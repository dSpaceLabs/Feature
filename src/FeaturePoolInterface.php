<?php

namespace Dspacelabs\Component\Feature;

/**
 * Feature Pool
 *
 * Contains a pool of features that the user can retreive from.
 *
 * The feature pool does not care where or how various features are stored, the
 * stored features can be anything from a yaml file to a database. Could also
 * be a mix of various options, the pool just does not care.
 */
interface FeaturePoolInterface
{
    /**
     * Adds feature to pool
     *
     * @param FeatureInterface $feature
     *   Feature to add to the pool of other features
     */
    public function add(FeatureInterface $feature);

    /**
     * Retrieve a feature from the pool
     *
     * MUST always return a FeatureInterface, if the feature does
     * not exist, then when `isEnabled()` is called, it should return
     * a default value.
     *
     * @param string $name
     * @return FeatureInterface
     */
    public function get($name);
}
