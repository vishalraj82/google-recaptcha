<?php

namespace Google\Recaptcha\GoogleRecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('google_recaptcha');

        $rootNode
            ->children()
                ->arrayNode('recaptcha')
                    ->children()
                        ->scalarNode('api')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->arrayNode('auth')
                            ->children()
                                ->scalarNode('secretkey')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                ->end()
                                ->scalarNode('sitekey')
                                    ->isRequired()
                                    ->cannotBeEmpty()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('messages')
                            ->isRequired()
                            ->requiresAtLeastOneElement()
                            ->useAttributeAsKey('name')
                            ->prototype('scalar')->end()
                        ->end()
                        ->arrayNode('events')
                            ->isRequired()
                            ->requiresAtLeastOneElement()
                            ->useAttributeAsKey('name')
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();


        return $treeBuilder;
    }
}
