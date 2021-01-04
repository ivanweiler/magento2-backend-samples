<?php

namespace Favicode\Sample04\Model;

use Magento\Framework\Model\AbstractModel;
use Favicode\Sample04\Api\Data\NewsInterface;

class News extends AbstractModel implements NewsInterface
{
    /**
     * Initialize news Model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Favicode\Sample04\Model\ResourceModel\News::class);
    }

    /**
     * Retrieve block id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::NEWS_ID);
    }

    /**
     * Retrieve block title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return NewsInterface
     */
    public function setId($id)
    {
        return $this->setData(self::NEWS_ID, $id);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return NewsInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

}