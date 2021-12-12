<?php
namespace Greendot\ImagePullerClient\DependencyInjection;

use App\DependencyInjection\Configuration;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ImagePullerExtension extends Extension {
    public function load(array $configs, ContainerBuilder $container) {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load("routing.yaml");
        $loader->load("services.yaml");
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        foreach ($config as $key => $value) {
            $container->setParameter('security_headers.' . $key, $value);
        }
    }
}