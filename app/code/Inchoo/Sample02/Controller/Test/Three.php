<?php

namespace Inchoo\Sample02\Controller\Test;

/**
 * Class Three
 * @package Inchoo\Sample02\Controller\Test
 *
 * What if we need more than one Dummy instance in our class?
 * We use Factory (Magento will generate that class for us)
 */
class Three extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Inchoo\Sample02\Model\DummyFactory
     */
    protected $dummyFactory;

    /**
     * Controller constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Inchoo\Sample02\Model\DummyFactory $dummyFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Inchoo\Sample02\Model\DummyFactory $dummyFactory
    ) {
        parent::__construct($context);
        $this->dummyFactory = $dummyFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        $dummy1 = $this->dummyFactory->create();
        var_dump($dummy1);

        $dummy2 = $this->dummyFactory->create();
        var_dump($dummy2);

        //..
    }
}
