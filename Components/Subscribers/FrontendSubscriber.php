<?php

namespace NetcomScrollToTop\Components\Subscribers;

use NetcomScrollToTop\Components\Services\PluginConfigurationService;

/**
 * Class FrontendSubscriber
 */
class FrontendSubscriber
{
    /**
     * @var string
     */
    protected $pluginDir;

    /**
     * @var PluginConfigurationService $pluginConfigurationService
     */
    protected $pluginConfigurationService;

    /**
     * FrontendSubscriber constructor.
     *
     * @param string                     $pluginDir
     * @param PluginConfigurationService $pluginConfigurationService
     */
    public function __construct($pluginDir, PluginConfigurationService $pluginConfigurationService)
    {
        $this->pluginDir = $pluginDir;
        $this->pluginConfigurationService = $pluginConfigurationService;
    }

    /**
     * @param \Enlight_Controller_ActionEventArgs $args
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     */
    public function onPostDispatchSecureFrontend(\Enlight_Controller_ActionEventArgs $args)
    {
        $config = $this->pluginConfigurationService->getConfiguration();

        if (!$config['showButtonMobile'] && !$config['showButtonDesktop']) {
            return;
        }

        /** @var \Enlight_View_Default $view */
        $view = $args->get('subject')->View();
        $view->assign('netcomScrollToTop', $config);
        $view->addTemplateDir($this->pluginDir . '/Resources/views');
        $view->extendsTemplate('frontend/plugins/netcom_scroll_to_top/index/index.tpl');
    }
}
