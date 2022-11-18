<?php
namespace NTTData\Practice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class Index extends \Magento\Framework\View\Element\Template
{    
       
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,       
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,  
        array $data = []
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;    
        parent::__construct($context, $data);
    }
    
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        return $collection;
    }
    
}
?>