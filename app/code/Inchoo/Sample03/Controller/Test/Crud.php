<?php

namespace Inchoo\Sample03\Controller\Test;

use Magento\Framework\App\Action\Context;

class Crud  extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Inchoo\Sample03\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Inchoo\Sample03\Model\NewsFactory
     */
    protected $newsModelFactory;

    /**
     * Controller constructor.
     * @param Context $context
     * @param \Inchoo\Sample03\Model\ResourceModel\News $newsResource
     * @param \Inchoo\Sample03\Model\NewsFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\Sample03\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample03\Model\NewsFactory $newsModelFactory
    ) {
        parent::__construct($context);

        $this->newsResource = $newsResource;
        $this->newsModelFactory = $newsModelFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        $news = $this->newsModelFactory->create();
        $news->setTitle('Some fake news title');

        //big dump, can crash browser
        //var_dump($news);

        var_dump($news->debug());

        $this->newsResource->save($news);

        //$this->newsResource->load($news, 1);
    }

}