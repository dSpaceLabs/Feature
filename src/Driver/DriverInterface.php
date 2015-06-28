<?php
/**
 */

namespace Dspacelabs\Component\Feature\Driver;

use Dspacelabs\Component\Feature\FeatureInterface;

/**
 * Driver Interface
 *
 * Drivers are used to save and retrieve features from various places. As an
 * example, a driver COULD be a DatabaseDriver where features and the related
 * configuration for that feature are stored in a database.
 */
interface DriverInterface
{
    /**
     * Retrieves a features
     *
     * @param string $name
     * @return FeatureInterface|null
     */
    public function retrieve($name);

    /**
     * Save the currently configured featured
     *
     * If the feature already exists, this should update the
     * feature
     *
     * @param FeatureInterface
     * @throws FeatureException
     */
    public function save(FeatureInterface $feature);

    /**
     * Remove feature
     *
     * @param string $name
     * @throws FeatureException
     */
    public function delete($name);

    /**
     * Checks to see if feature exists
     *
     * @param string $name
     * @return boolean
     */
    public function exists($name);
}
