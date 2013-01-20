<?php

namespace Navid\Template\Tests;

use Herrera\Template\TemplateServiceProvider;
use PHPUnit_Framework_TestCase as TestCase;
use Silex\Application;

class TemplateServiceProviderTest extends TestCase
{
    private $app;

    public function testEngineNotConfigured()
    {
        $this->setExpectedException('RuntimeException');

        $this->app['template.engine'];
    }

    public function testEngine()
    {
        $this->app['template.dir'] = __DIR__ . '/../../../../../res/template';

        $this->assertEquals(
            <<<RENDER
<html>
  <head>
    <title>Test</title>
  </head>
  <body>
    <p>Test paragraph.</p>
  </body>
</html>
RENDER
            ,
            $this->app['template.engine']->render(
                'test.php',
                array(
                    'title' => 'Test',
                    'p' => 'Test paragraph.'
                ),
                true
            )
        );
    }

    protected function setUp()
    {
        $this->app = new Application();

        $this->app->register(new TemplateServiceProvider());
    }
}