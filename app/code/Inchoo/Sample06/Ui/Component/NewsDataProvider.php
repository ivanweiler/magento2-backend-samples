<?php

namespace Inchoo\Sample06\Ui\Component;

class NewsDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Inchoo\Sample04\Model\ResourceModel\News\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->collection = $collectionFactory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        /**
         * This is just a hack-around to use one DataProvider for both grid and form,
         * it's probably really bad idea
         */
        if($this->getName() == 'news_form_data_source') {

            $dataObject = $this->getCollection()->getFirstItem();

            $data = [
                $dataObject->getId() => $dataObject->toArray()
            ];

        } else {
            $data = $this->getCollection()->toArray();
        }

        return $data;
    }
}