<?php
namespace NTTData\Practice\Block;
class Order extends \Magento\Framework\View\Element\Template
{    
  
     /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
  
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }
    
    
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addAttributeToSort('name', 'DESC');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize(10); // fetching only 3 products

        return $collection;
    }
}