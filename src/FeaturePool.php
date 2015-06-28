<?php

namespace Dspacelabs\Component\Feature;

/**
 */
class FeaturePool implements FeaturePoolInterface
{
    /**
     * @var array
     */
    protected $pool;

    /**
     * {@inheritDoc}
     */
    public function add(FeatureInterface $feature)
    {
        $this->pool[$feature->getName()] = $feature;
    }

    /**
     * {@inheritDoc}
     */
    public function get($name)
    {
        if (isset($this->pool[$name])) {
            return $this->pool[$name];
        }
    }
}
