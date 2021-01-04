<?php

namespace Favicode\Sample04\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface NewsRepositoryInterface
{
    /**
     * Retrieve news.
     *
     * @param int $newsId
     * @return \Favicode\Sample04\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($newsId);

    /**
     * Save news.
     *
     * @param \Favicode\Sample04\Api\Data\NewsInterface $news
     * @return \Favicode\Sample04\Api\Data\NewsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\NewsInterface $news);

    /**
     * Delete news.
     *
     * @param \Favicode\Sample04\Api\Data\NewsInterface $news
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\NewsInterface $news);

    /**
     * Retrieve news matching the specified search criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Favicode\Sample04\Api\Data\NewsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
