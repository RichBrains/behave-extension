<?php

namespace RichBrains\BehaveExtension;

use Symfony\Component\Config\FileLocator,
    Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition,
    Symfony\Component\DependencyInjection\ContainerBuilder,
    Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

use Behat\Behat\Extension\ExtensionInterface;

class Extension implements ExtensionInterface
{

    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/services'));
        $loader->load('core.xml');

        if (isset($config['host'])) {
            $container->setParameter('behat.jira.host', rtrim($config['host'], '/'));
        }
        if (isset($config['user'])) {
            $container->setParameter('behat.jira.user', $config['user']);
        }
        if (isset($config['password'])) {
            $container->setParameter('behat.jira.password', $config['password']);
        }
        if (isset($config['project'])) {
            $container->setParameter('behat.jira.project', $config['project']);
        }
    }

    public function getConfig(ArrayNodeDefinition $builder)
    {
        $builder->
            children()->
                scalarNode('host')->
                    defaultNull()->
                end()->
                scalarNode('user')->
                    defaultNull()->
                end()->
                scalarNode('password')->
                    defaultNull()->
                end()->
                scalarNode('project')->
                    defaultNull()->
                end()->
            end()->
        end();
    }

    public function getCompilerPasses()
    {
        return array();
    }
}
