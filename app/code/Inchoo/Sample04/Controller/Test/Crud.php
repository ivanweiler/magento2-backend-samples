<?php

namespace Inchoo\Sample04\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class Crud extends Action
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
     * Crud constructor.
     *
     * @param Context $context
     * @param \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository
     * @param \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory
     */
    public function __construct(
        Context $context,
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsModelFactory
    ) {
        parent::__construct($context);
        $this->newsRepository = $newsRepository;
        $this->newsModelFactory = $newsModelFactory;
    }

    /**
     * Controller action.
     */
    public function execute()
    {
        /**
         * Load through repository example
         */
        try {
            $news = $this->newsRepository->getById(1);
            var_dump($news->debug());
        } catch (NoSuchEntityException $e) {
            //handle error
        }

        /**
         * Save through repository example
         */

        try {
            $news = $this->newsModelFactory->create();
            $news->setTitle('Dummy news title');

            $this->newsRepository->save($news);
            var_dump($news->debug());
        } catch (CouldNotSaveException $e) {
            //handle error
        }

    }

}