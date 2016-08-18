<?php

namespace CubeTest\DoctrineEntityFactory;

use Cube\DoctrineEntityFactory\Exception\InvalidArgumentException;
use Cube\DoctrineEntityFactory\SimpleEntityFactory;
use PHPUnit\Framework\TestCase;

/**
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
final class SimpleEntityFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testSimpleConstruction()
    {
        $factory = new SimpleEntityFactory();

        $result = $factory->get(\stdClass::class);

        $this->assertInstanceOf(\stdClass::class, $result);
    }

    /**
     * @param $invalidArgument
     * @return void
     * @dataProvider invalidArgumentProvider
     */
    public function testExceptionIfInvalidArgument($invalidArgument)
    {
        $factory = new SimpleEntityFactory();

        $this->expectException(InvalidArgumentException::class);

        $factory->get($invalidArgument);
    }

    /**
     * @return array
     */
    public function invalidArgumentProvider()
    {
        return [
            [123],
            [new \stdClass()],
            ['noClass'],
            [null],
        ];
    }
}
