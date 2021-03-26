<?php

namespace KnpU\LoremIpsumBundle\DependencyInjection\Complier;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class WordProviderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');
        $references = [];
        foreach ($container->findTaggedServiceIds('knpu_ipsum_word_provider') as $taggedServiceId => $tags) {
            $references[] = new Reference($taggedServiceId);
        }
        $definition->setArgument(0, $references);
    }
}