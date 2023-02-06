<?php

namespace NTTData\Prueba\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\Prueba\Model\Item;
use NTTData\Prueba\Model\ResourceModel\Item as ResourceItem;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Item::class, ResourceItem::class);
    }

}