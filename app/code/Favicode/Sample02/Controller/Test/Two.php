<?php

namespace Favicode\Sample02\Controller\Test;

class Two extends \Magento\Framework\App\Action\Action
{
    protected $dummy;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Favicode\Sample02\Model\DummyInterface $dummy
    ) {
        parent::__construct($context);
        $this->dummy = $dummy;
    }

    public function execute()
    {
        var_dump($this->dummy);
    }
}
