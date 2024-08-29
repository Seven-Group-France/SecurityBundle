<?php

namespace Sevengroup\SecurityBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sevengroup_security');

        $treeBuilder->getRootNode()
          ->children()
            ->scalarNode('api_url')
              ->isRequired()
              ->cannotBeEmpty()
            ->end()
        ;

        return $treeBuilder;
    }
}