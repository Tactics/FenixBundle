<?php

namespace Tactics\FenixBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tactics\FenixBundle\DependencyInjection\CompilerPass;
use Tactics\FenixBundle\DependencyInjection\CrsvCompilerPass;

/**
 * Class TacticsFenixBundle
 * @package Tactics\TacticsFenixBundle
 */
class TacticsFenixBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new CompilerPass());
    }
}
