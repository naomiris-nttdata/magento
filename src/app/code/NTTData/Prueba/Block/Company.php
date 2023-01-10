<?php

namespace NTTData\Prueba\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class Company extends \Magento\Framework\View\Element\Template
{    
       
    public function __construct(
        Context $context,
        \NTTData\Prueba\Model\ItemFactory $itemFactory,
    
        array $data = array()
    ) {
        $this->_itemFactory = $itemFactory;
        
    }
    public function getCollection(){

        $topic = $this->_itemFactory->create();
        $collection = $topic->getCollection();
        foreach($collection as $item){
            var_dump($item->getData());
        }
        exit;    
    }
    
}
?>

