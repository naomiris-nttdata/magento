<?php
namespace NTTData\Prueba\Controller\Adminhtml\Actions;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use NTTData\Prueba\Model\ResourceModel\Item\CollectionFactory;

class Average extends Action
{
    public $collectionFactory;

    public $filter;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        \NTTData\Prueba\Model\ItemFactory $itemFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $count = 0;
            foreach ($collection as $item){
               $data[] = $item['employees_age'];
               $count++;
            }
            $result_sum = array_sum($data);
            $average = $result_sum / $count;
    
            $this->messageManager->addSuccess(__('The average age of the selected employees is %1.', $average));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('prueba/index/index');


    }
}