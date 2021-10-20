<?php

namespace Tactics\FenixBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CrsvCompilerPass
 * @package Tactics\FenixBundle\DependencyInjection
 */
class CompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('tactics_crsv.object_updater');
        $updaterServices = $container->findTaggedServiceIds('tactics_crsv.field_updater');

        foreach ($updaterServices as $id => $attributes) {
            $definition->addMethodCall(
                'registerFieldUpdater',
                array(new Reference($id))
            );
        }
    }
}