<?php

namespace Tactics\CrsvBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CrsvCompilerPass
 * @package Tactics\CrsvBundle\DependencyInjection
 */
class CompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('csrv.field_updater_manager');
        $updaterServices = $container->findTaggedServiceIds('crsv_field_updater');

        foreach ($updaterServices as $id => $attributes) {
            $definition->addMethodCall(
                'registerFieldUpdater',
                array(new Reference($id))
            );
        }
    }
}