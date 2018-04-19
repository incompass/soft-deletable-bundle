<?php

namespace Incompass\SoftDeletableBundle\DependencyInjection;

use Incompass\TimestampableBundle\EntityListener\TimestampableListener;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class SharedExtension
 *
 * @package Incompass\SharedBundle\DependencyInjection
 * @author  Joe Mizzi <joe@casechek.com>
 */
class SharedExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\BadMethodCallException
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $definition = new Definition(TimestampableListener::class);
        $definition->addTag('doctrine.event_listener', ['event' => 'onFlush', 'priority' => -9999]);
        $container->setDefinition('timestampable.listener', $definition);
    }
}
