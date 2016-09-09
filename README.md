Doctrine Entity Factory
=======================

[![Build Status](https://travis-ci.org/Cube-Solutions/doctrine-entity-factory.svg?branch=master)](https://travis-ci.org/Cube-Solutions/doctrine-entity-factory)
[![Packagist](https://img.shields.io/packagist/v/cube/doctrine-entity-factory.svg)](https://packagist.org/packages/cube/doctrine-entity-factory)
[![Author](http://img.shields.io/badge/author-@gabriel_somoza-blue.svg)](https://twitter.com/gabriel_somoza)
[![License](https://img.shields.io/packagist/l/cube/doctrine-entity-factory.svg)](https://github.com/cube/doctrine-entity-factory/blob/master/LICENSE)

A factory pattern for creating new Doctrine entities.  Since Doctrine 2.0 entities may be created which use the constructor.  In order to create a standard factory pattern which may be implemented across libraries which implement Doctrine this repository provides an interface for factories to create an entity which is to be newly persisted to the object manager.


Installation
------------

Installation of this module uses composer. For composer documentation, please refer to [getcomposer.org](http://getcomposer.org/).

```sh
$ php composer.phar require cube/doctrine-entity-factory
```


Provided Factories
------------------
`Cube\DoctrineEntityFactory\SimpleEntityFactory` Creates entities bare with no constructor parameters.

`Cube\DoctrineEntityFactory\BypassConstructorEntityFactory` Uses reflection to create an entity without triggering the constructor.
