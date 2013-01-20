Silex Template
==============

A Silex service provider for Template.

Summary
-------

Adds an instance of `Herrera\Template\Engine` to Silex under the key `template.engine`.

Installation
------------

Add it to your list of Composer dependencies:

```sh
$ composer require herrera-io/silex-template=1.*
```

Usage
-----

```php
<?php

use Herrera\Template\TemplateServiceProvider;
use Silex\Application;

$app = new Application();

$app->register(new TemplateServiceProvider(), array(
    'template.dir' => '/path/to/dir',
    'template.dir' => array(
        '/path/to/dir1',
        '/path/to/dir2',
        '/path/to/dir3',
    )
));

$app['template.engine']->render('test.php');
```