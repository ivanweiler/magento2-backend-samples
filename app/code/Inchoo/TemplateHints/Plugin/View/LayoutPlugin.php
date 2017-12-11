<?php

namespace Inchoo\TemplateHints\Plugin\View;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Layout;
use Magento\Developer\Helper\Data as DevHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class LayoutPlugin
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var DevHelper
     */
    protected $devHelper;

    /**
     *
     * @var Layout $layout
     */
    private $layout;

    /**
     * LayoutPlugin constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     * @param DevHelper $devHelper
     * @param DirectoryList $directoryList
     * @param Layout $layout
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        DevHelper $devHelper,
        DirectoryList $directoryList,
        Layout $layout
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->devHelper = $devHelper;
        $this->layout = $layout;

    }

    /**
     * @param Layout $layout
     * @param \Closure $proceed
     * @param $name
     * @return mixed|string
     */
    public function aroundRenderNonCachedElement(Layout $layout, \Closure $proceed, $name)
    {
        $result = $proceed($name);

        $storeCode = $this->storeManager->getStore()->getCode();

        if ($this->scopeConfig->getValue(
            'dev/debug/template_hints_storefront',
            ScopeInterface::SCOPE_STORE,
            $storeCode
            ) && $this->devHelper->isDevAllowed()) {

            $result = $this->_wrapElement($result, $name);
        }

        return $result;
    }


    private function _wrapElement($result, $name)
    {
        if ($this->layout->isUiComponent($name) || $this->layout->isBlock($name)) {

            /** @var \Magento\Framework\View\Element\AbstractBlock $block */
            $block = $this->layout->getBlock($name);

            /*
            // show block template (phtml) after name; uncomment and test
            $template = $block->getTemplate();

            if($template) {
                $name .= " ($template)";
            }
            */

            //don't show empty blocks
            if(empty($result)) {
                //return $result;
            }

            $result = <<<HTML
<div class="debugging-hints" style="position: relative; border: 1px dotted red; margin: 6px 2px; padding: 18px 2px 2px 2px;">
<div class="debugging-hint-template-file" style="position: absolute; top: 0; padding: 2px 5px; font: normal 11px Arial; background: red; left: 0; color: white; white-space: nowrap;" title="{$name}">{$name}</div>
{$result}
<div style="clear:both"></div>
</div>
HTML;

        } elseif ($this->layout->isContainer($name)) {

            $result = <<<HTML
<div class="debugging-hints" style="position: relative; border: 1px dotted blue; margin: 6px 2px; padding: 18px 2px 2px 2px;">
<div class="debugging-hint-template-file" style="position: absolute; top: 0; padding: 2px 5px; font: normal 11px Arial; background: blue; left: 0; color: white; white-space: nowrap;" title="{$name}">{$name}</div>
{$result}
<div style="clear:both"></div>
</div>
HTML;
        }

        return $result;
    }

}
