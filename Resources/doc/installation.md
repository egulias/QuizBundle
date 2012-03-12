# Installation and configuration

## Get the bundle

Add to your `/deps` file :

```
[EguliasQuizBundle]
    git=git@github.com:egulias/EguliasQuizBundle.git
    target=/bundles/Egulias/QuizBundle
```
  * Side note: remember to add the `version=` tag if you need a particular version
    
And make a `php bin/vendors install`.

## Register the namespace

``` php
<?php

  // app/autoload.php
  $loader->registerNamespaces(array(
      'Egulias' => __DIR__.'/../vendor/bundles',
      // your other namespaces
      ));
```

## Add EguliasQuizBundle to your application kernel

``` php
<?php

  // app/AppKernel.php
  public function registerBundles()
  {
    return array(
      // ...
      new Egulias\QuizBundle\EguliasQuizBundle(),
      // ...
      );
  }
```

## Update the database

Assuming you are working with Dcotrine 2 for Symfony 2 you need to update your schema as follows:

### Confirm the schema needs update
``` 
app/console doctrine:schema:update
```

### Update the schema 
``` 
app/console doctrine:schema:update --force
```

## URLs

This bundle uses Annotations for its routing so you will find them inside each controller.
In order to use the bundle out of the box you need to import the routing file in your main routing.yml as follows:
``` yml
EguliasQuizBundle:
    resource: "@EguliasQuizBundle/Controller/"
    type:     annotation
    prefix:   /
```
