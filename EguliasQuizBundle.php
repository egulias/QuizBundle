<?php

namespace Egulias\QuizBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Egulias\QuizBundle\DependencyInjection\Compiler\EventsCompilerPass;

class EguliasQuizBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new EventsCompilerPass);
    }
}
