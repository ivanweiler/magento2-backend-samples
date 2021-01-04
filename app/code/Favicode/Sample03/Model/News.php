<?php

namespace Favicode\Sample03\Model;

class News extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize news Model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Favicode\Sample03\Model\ResourceModel\News::class);
    }

}