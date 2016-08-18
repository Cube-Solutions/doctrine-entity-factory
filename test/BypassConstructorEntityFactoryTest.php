<?php

namespace CubeTest\DoctrineEntityFactory;

use Cube\DoctrineEntityFactory\BypassConstructorEntityFactory;
use PHPUnit\Framework\TestCase;

/**
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
final class BypassConstructorEntityFactoryTest extends TestCase
{
    /**
     * @return void
     * @dataProvider validClassesProvider
     */
    public function testInstantiatesWithoutConstructor($className)
    {
        $factory = new BypassConstructorEntityFactory();

        $result = $factory->get($className);

        $this->assertInstanceOf($className, $result);
    }

    /**
     * validClassesProvider
     * @return array
     */
    public function validClassesProvider()
    {
        return [
            [\stdClass::class], // a class without constructor dependencies
            [\DateTimeZone::class], // a class WITH constructor dependencies
        ];
    }
}
