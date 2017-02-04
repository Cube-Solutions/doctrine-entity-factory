Doctrine Entity Factory
=======================

[![Build Status](https://travis-ci.org/Cube-Solutions/doctrine-entity-factory.svg?branch=master)](https://travis-ci.org/Cube-Solutions/doctrine-entity-factory)
[![Code Coverage](https://scrutinizer-ci.com/g/gsomoza/doctrine-entity-factory/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gsomoza/doctrine-entity-factory/?branch=master)
[![Packagist](https://img.shields.io/packagist/v/cube/doctrine-entity-factory.svg)](https://packagist.org/packages/cube/doctrine-entity-factory)
[![Author](http://img.shields.io/badge/author-@gabriel_somoza-blue.svg)](https://twitter.com/gabriel_somoza)
[![License](https://img.shields.io/packagist/l/cube/doctrine-entity-factory.svg)](https://github.com/cube/doctrine-entity-factory/blob/master/LICENSE)

A factory pattern for creating new Doctrine entities.  Since Doctrine 2.0 entities may be created which use the constructor.  In order to create a standard factory pattern which may be implemented across libraries which implement Doctrine this repository provides an interface for factories to create an entity which is to be newly persisted to the object manager.


Installation
------------

Installation of this module uses composer. For composer documentation, please refer to [getcomposer.org](http://getcomposer.org/).

```bash
$ php composer.phar require cube/doctrine-entity-factory
```

## What Problem does this Solve?
Let's say you have a class that, at some point, has to instantiate a new Doctrine entity. A good example is DoctrineResource from the zfcampus/zf-apigility-admin project, simplified below:

```php
class DoctrineResource 
{
  public function create($data)
  {
    $entityClass = $this->getEntityClass();
    // ...
    $entity = new $entityClass(); // notice this line
    // ...
    return $entity;
  }
}
```

The problem with the code above is that their users can't instantiate any entities that have required parameters in the constructor. They also can't use a named constructor to instantiate the object if they wanted to. There could be many reasons why they have required parameters in their entity's constructor, but since Doctrine is designed to allow that then so should you. Moreover, in the example above `DoctrineResource` is acting as the de-facto factory for the entities, which is one responsibility too many for that class.

The solution is to decouple the instantiation of your user's Doctrine entities from your library. So we created an interface, `EntityFactoryInterface`, that can be used by any library that needs a new instance of a Doctrine entity, but wants to delegate the process of actually building that entity. Your updated class would look as follows:

```php
use Cube\DoctrineEntityFactory\EntityFactoryInterface;
class DoctrineResource 
{
  /** 
    * @var EntityFactoryInterface Set e.g. via DI, can default to SimpleEntityFactory
    *                             to avoid BC breaks 
    */
  private $entityFactory; 
  
  public function create($data)
  {
    $entityClass = $this->getEntityClass();
    // ...
    $entity = $this->entityFactory->get($entityClass); 
    // ...
    return $entity;
  }
}
```

And now your class doesn't need to actually instantiate the Doctrine entity!

## Yet Another Library (roll eyes)?
Yes, because the use-case described above happens quite often actually around several Doctrine libraries. By providing a decentralized interface we can make all of these other libraries delegate instantiation to the same type of factory.

This library also provides two simple implementations:

* `SimpleEntityFactory`: the SOLID equivalent to doing `new $entityClass`
* `BypassConstructorEntityFactory`: will build the entity using reflection to entirely bypass the constructor.

Other implementations are possible, and the most common will probably be end-user factories that know how to instantiate their entities very well.

## Is This Library for Me?
This library is for you if you're distributing code that needs a new instance of a Doctrine entity, but you don't personally have (or want!) any knowledge or control over HOW that entity must be instantiated.

## License
See [LICENSE.md](https://github.com/Cube-Solutions/doctrine-entity-factory/blob/master/LICENSE.md)
