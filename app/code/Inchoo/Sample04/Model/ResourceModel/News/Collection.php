<?php

namespace Inchoo\Sample04\Model\ResourceModel\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize news Collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Inchoo\Sample04\Model\News::class,
            \Inchoo\Sample04\Model\ResourceModel\News::class
        );
    }
}
