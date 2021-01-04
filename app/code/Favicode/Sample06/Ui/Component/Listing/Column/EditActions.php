<?php

namespace Favicode\Sample06\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class EditActions
 */
class EditActions extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        foreach ($dataSource['data']['items'] as & $item) {
            if (isset($item['news_id'])) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->context->getUrl(
                            'sample06/news/edit',
                            ['news_id' => $item['news_id']]
                        ),
                        'label' => __('Edit')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}
