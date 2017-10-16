<?php

namespace Inchoo\Sample03\Model\ResourceModel;

class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize news Resource
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('inchoo_news', 'news_id');
    }
}
