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
            $definition->addMethodCall(
                'addListener',
                array(QuizEvents::onQuizResponse,array(new Reference($id),$attributes[0]['method']))
            );
        }
    }
}
