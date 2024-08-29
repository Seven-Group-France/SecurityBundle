<?php

namespace Sevengroup\SecurityBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sevengroup');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('security')
                    ->children()
                      ->scalarNode('api_url')
                        ->isRequired()
                        ->cannotBeEmpty()
                      ->end()
                    ->end()
        ;

        return $treeBuilder;
    }
}