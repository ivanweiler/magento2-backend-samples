<?php

namespace Favicode\Sample03\Controller\Test;

use Magento\Framework\App\Action\Context;

class Crud  extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Favicode\Sample03\Model\ResourceModel\News
     */
    protected $newsResource;

    /**
     * @var \Favicode\Sample03\Model\NewsFactory
     */
    protected $newsModelFactory;

    /**
     * Controller constructor.
     * @param Context $context
     * @param \Favicode\Sample03\Model\ResourceModel\News $newsResource
     * @param \Favicode\Sample03\Model\NewsFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Favicode\Sample03\Model\ResourceModel\News $newsResource,
        \Favicode\Sample03\Model\NewsFactory $newsModelFactory
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
        /**
         * New entry example
         */
        $news = $this->newsModelFactory->create();
        $news->setTitle('Some fake news title');

        $this->newsResource->save($news);

        //var_dump($news); //big dump, can crash browser without xdebug
        var_dump($news->debug());


        /**
         * Load example
         */
        $news = $this->newsModelFactory->create();
        $this->newsResource->load($news, 1);

        if($news->getId()) {
            //check if loaded
        }

        var_dump($news->debug());
    }

}