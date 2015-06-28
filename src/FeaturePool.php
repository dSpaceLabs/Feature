<?php

namespace Dspacelabs\Component\Feature;

use Dspacelabs\Component\Feature\Driver\DriverInterface;

/**
 */
class FeaturePool implements FeaturePoolInterface
{
    /**
     * @var DriverInterface
     */
    protected $driver;

    /**
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * {@inheritDoc}
     */
    public function add(FeatureInterface $feature)
    {
        $this->driver->save($feature);
    }

    /**
     * {@inheritDoc}
     */
    public function get($name)
    {
        $feature = $this->driver->retrieve($name);
    }
}
