<?php

namespace Greendot\ImagePullerClient\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('image_puller_client');
        $root = $treeBuilder->getRootNode();
        $root
            ->children()
                ->scalarNode('jwt_user')->defaultValue('greendot')->end()
                ->scalarNode('jwt_pass')->defaultValue('NecumV')->end()
            ->end();
        return $treeBuilder;
    }
}