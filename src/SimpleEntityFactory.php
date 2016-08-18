<?php

namespace Cube\DoctrineEntityFactory;

/**
 * Creates an entity directly - without passing any constructor arguments.
 *
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
final class SimpleEntityFactory implements EntityFactoryInterface
{
    /**
     * Gets an instance of the specified entity
     *
     * @param string $entityClassName
     *
     * @return object
     */
    public function get($entityClassName)
    {
        return new $entityClassName();
    }
}
