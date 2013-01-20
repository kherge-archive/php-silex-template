<?php

namespace Herrera\Template;

use Herrera\Template\Engine;
use RuntimeException;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Adds Template as a shared service.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class TemplateServiceProvider implements  ServiceProviderInterface
{
    // @codeCoverageIgnoreStart
    /**
     * @override
     */
    public function boot(Application $app)
    {
    }
    // @codeCoverageIgnoreEnd

    /**
     * @override
     */
    public function register(Application $app)
    {
        $app['template.engine'] = $app->share(function() use ($app) {
            if (false === isset($app['template.dir'])) {
                throw new RuntimeException(
                    'The template.dir parameter is not set.'
                );
            }

            return Engine::create($app['template.dir']);
        });
    }
}