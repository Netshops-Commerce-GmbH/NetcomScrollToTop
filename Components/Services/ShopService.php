<?php

namespace NetcomScrollToTop\Components\Services;

use Shopware\Components\Model\ModelManager;
use Shopware\Models\Shop\Shop;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ShopService
 */
class ShopService
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * PluginConfigurationService constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return bool|object|ModelManager
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    public function getShop()
    {
        $shop = false;
        if ($this->container->has('shop')) {
            $shop = $this->container->get('shop');
        }

        if (!$shop) {
            $shop = $this->container->get('models')->getRepository(Shop::class)->getActiveDefault();
        }

        return $shop;
    }
}
