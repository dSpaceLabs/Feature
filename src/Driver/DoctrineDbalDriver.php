<?php
/**
 */

namespace Dspacelabs\Component\Feature\Driver;

use Doctrine\DBAL\Connection;
use Dspacelabs\Component\Feature\FeatureInterface;

/**
 * Low level driver to use doctrine dbal to store features
 *
 * Please see doctrine documentation on creating a connection object.
 *
 * ```php
 * $connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
 * $driver     = new DoctrineDbalDriver($connection);
 * $pool       = new FeaturePool($driver);
 * ```
 *
 * @see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
 *
 */
class DoctrineDbalDriver implements DriverInterface
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $connection;

    /**
     * @param \Doctrine\DBAL\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritDoc}
     */
    public function retrieve($name)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function save(FeatureInterface $feature)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function delete($name)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function exists($name)
    {
    }
}
