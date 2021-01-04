<?php

namespace Favicode\Sample03\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize news Collection
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Favicode\Sample03\Model\News::class,
            \Favicode\Sample03\Model\ResourceModel\News::class
        );
    }
}
