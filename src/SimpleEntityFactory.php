<?php

namespace Cube\DoctrineEntityFactory;
use Cube\DoctrineEntityFactory\Exception\InvalidArgumentException;

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
        if (!is_string($entityClassName) || !class_exists($entityClassName)) {
            throw new InvalidArgumentException('Expected $entityClassName to be a valid class name.');
        }

        return new $entityClassName();
    }
}
