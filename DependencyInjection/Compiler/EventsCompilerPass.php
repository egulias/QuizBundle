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

        foreach ($container->findTaggedServiceIds('egulias.quiz.event_listener') as $id => $events) {
            foreach ($events as $event)
            {
                $priority = isset($event['priority']) ? $event['priority'] : 0;

                if (!isset($event['event'])) {
                    throw new \InvalidArgumentException(
                        sprintf('Service "%s" must define "event" attribute in "desymfony_user.event_listener" tags.', $id)
                    );
                }

                if (!isset($event['method'])) {
                    throw new \InvalidArgumentException(
                        sprintf('Service "%s" must define "method" attribute in "desymfony_user.event_listener" tags.', $id)
                    );
                }
                $definition->addMethodCall(
                    'addListenerService',
                    array(
                        $event['event'],
                        array($id, $event['method'])
                        , $priority
                    )
                );
            }
        }
    }
}
