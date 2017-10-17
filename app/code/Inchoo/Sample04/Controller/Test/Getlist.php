<?php

namespace Inchoo\Sample04\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

use Inchoo\Sample04\Api\Data\NewsInterface;

use Inchoo\Sample04\Api\NewsRepositoryInterface;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;


class Getlist extends Action
{
    /**
     * @var \Inchoo\Sample04\Api\NewsRepositoryInterface
     */
    protected $newsRepository;

    /**
     * @var \Inchoo\Sample04\Api\Data\NewsInterfaceFactory
     */
    protected $newsModelFactory;



    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $filterBuilder;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Getlist constructor.
     *
     * @param Context $context
     * @param NewsRepositoryInterface $newsRepository
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        Context $context,
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder

    ) {
        parent::__construct($context);

        $this->newsRepository = $newsRepository;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        /**
         * Get news where id > 3, using Repository
         */

        /**
         * We use searchCriteriaBuilder to create searchCriteria object
         */
        $this->searchCriteriaBuilder->addFilter(NewsInterface::NEWS_ID, 3, 'gt');
        $searchCriteria = $this->searchCriteriaBuilder->create();

        /**
         * We call Repository::getList()
         */
        $result = $this->newsRepository->getList($searchCriteria)->getItems();

        foreach ($result as $news) {
            var_dump($news->debug());
        }

    }

}