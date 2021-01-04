<?php

namespace Favicode\Sample04\Model\ResourceModel\News;

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
            \Favicode\Sample04\Model\News::class,
            \Favicode\Sample04\Model\ResourceModel\News::class
        );
    }
}
