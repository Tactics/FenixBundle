<?php

namespace Tactics\CrsvBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tactics\CrsvBundle\DependencyInjection\CompilerPass;
use Tactics\CrsvBundle\DependencyInjection\CrsvCompilerPass;


/**
 * Class TacticsCrsvBundle
 * @package Tactics\TacticsCrsvBundle
 */
class TacticsCrsvBundle extends Bundle
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
