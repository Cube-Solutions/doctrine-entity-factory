<?php

namespace Cube\DoctrineEntityFactory;

/**
 * Instantiates a given entity bypassing it's constructor
 *
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
final class BypassConstructorEntityFactory implements EntityFactoryInterface
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
        $klass = new \ReflectionClass($entityClassName);

        return $klass->newInstanceWithoutConstructor();
    }
}
