<?php

namespace NTTData\Prueba\Controller\Adminhtml\Item;

use NTTData\Prueba\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        
        return $this->resultRedirectFactory->create()->setPath('prueba/index/index');
    }
}