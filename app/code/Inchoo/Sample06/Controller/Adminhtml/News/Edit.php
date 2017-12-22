<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * Edit News action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Inchoo_Sample06::news');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit News'));

        return $resultPage;
    }
}
