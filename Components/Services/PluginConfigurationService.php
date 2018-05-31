<?php

namespace NetcomScrollToTop\Components\Services;

use Shopware\Components\Plugin\CachedConfigReader;

/**
 * Class PluginConfigurationService
 */
class PluginConfigurationService
{
    /**
     * @var string
     */
    protected $pluginName;

    /**
     * @var CachedConfigReader
     */
    protected $configReader;

    /**
     * @var ShopService
     */
    protected $shopService;

    /**
     * PluginConfigurationService constructor.
     *
     * @param string             $pluginName
     * @param CachedConfigReader $configReader
     * @param ShopService        $shopService
     */
    public function __construct($pluginName, CachedConfigReader $configReader, ShopService $shopService)
    {
        $this->pluginName = $pluginName;
        $this->configReader = $configReader;
        $this->shopService = $shopService;
    }

    /**
     * @return array|bool|mixed
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    public function getConfiguration()
    {
        $shop = $this->shopService->getShop();

        if (!$shop) {
            return false;
        }

        return $this->configReader->getByPluginName($this->pluginName, $shop);
    }
}
