<?php

namespace Favicode\Sample04\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface NewsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get news list.
     *
     * @return \Favicode\Sample04\Api\Data\NewsInterface[]
     */
    public function getItems();

    /**
     * Set news list.
     *
     * @param \Favicode\Sample04\Api\Data\NewsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
