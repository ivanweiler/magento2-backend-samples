<?php

namespace Favicode\Sample03\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class CreateSampleNews implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var \Favicode\Sample03\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Favicode\Sample03\Model\NewsFactory
     */
    protected $newsModelFactory;

    /**
     * CreateSampleNews constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param \Favicode\Sample03\Model\ResourceModel\News $newsResource
     * @param \Favicode\Sample03\Model\NewsFactory $newsModelFactory
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup, //not used, only here to check
        \Favicode\Sample03\Model\ResourceModel\News $newsResource,
        \Favicode\Sample03\Model\NewsFactory $newsModelFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;

        $this->newsResource = $newsResource;
        $this->newsModelFactory = $newsModelFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
        /** @var \Favicode\Sample03\Model\News $sampleNews */
        $sampleNews = $this->newsModelFactory->create();
        $sampleNews->setData([
            'title' => 'Sample news added with setup'
        ]);

        $this->newsResource->save($sampleNews);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
