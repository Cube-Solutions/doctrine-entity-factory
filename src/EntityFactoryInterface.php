<?php

namespace Cube\DoctrineEntityFactory;

/**
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
interface EntityFactoryInterface
{
    /**
     * Gets an instance of the specified entity
     *
     * @param string $entityClassName
     *
     * @return object
     */
    public function get($entityClassName);
}
