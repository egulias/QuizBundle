<?php

namespace Egulias\QuizBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;
use Egulias\QuizBundle\Event\QuizEvents;

/**
 * EventsCompilerPass
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class EventsCompilerPass implements CompilerPassInterface
{
    /**
     * process
     *
     * @see CompilerPassInterface::process
     *
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('event_dispatcher')) {
            return;
        }

        $definition = $container->getDefinition('event_dispatcher');

        foreach ($container->findTaggedServiceIds('egulias.event_listener') as $id => $attributes) {
            $priority = isset($attributes[0]['priority']) ? $attributes[0]['priority'] : 0;

            if (!isset($attributes[0]['event'])) {
                throw new \InvalidArgumentException(
                    sprintf('Service "%s" must define "event" attribute in "desymfony_user.event_listener" tags.', $id)
                );
            }

            if (!isset($attributes[0]['method'])) {
                throw new \InvalidArgumentException(
                    sprintf('Service "%s" must define "method" attribute in "desymfony_user.event_listener" tags.', $id)
                );
            }
            $definition->addMethodCall(
                'addListenerService',
                array(
                  $attributes[0]['method'],
                  array($id, $attributes[0]['method'])
                  , $priority
                )
            );
        }
    }
}
