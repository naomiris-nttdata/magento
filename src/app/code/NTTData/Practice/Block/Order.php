<?php
namespace NTTData\Practice\Block;

use NTTData\Practice\Helper\Data;

class Order extends \Magento\Framework\View\Element\Template
{    
     /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @var \NTTData\Practice\Helper\Data
     */
    private $helper;

    /**
     * @param Data $helper
     */
    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \NTTData\Practice\Helper\Data $helper)
    {   
        parent::__construct($context);
        $this->_helper = $helper; 
        $this->_productCollectionFactory = $productCollectionFactory;
    }
   
 
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToSort('name', $this->_helper->GetOrderDirectionValue());
        $collection->addAttributeToFilter('description', array('like' => '% '.$this->_helper->GetOrderFieldAttributeValue().' %'));
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize($this->_helper->GetLimitValue());
        return $collection;
    }
    public function isModuleEnabled()
    {
        return $this->_helper->isEnabled();
        
    }

}