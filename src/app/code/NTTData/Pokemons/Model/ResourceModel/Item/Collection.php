<?php

namespace NTTData\Pokemons\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\Pokemons\Model\Item;
use NTTData\Pokemons\Model\ResourceModel\Item as ResourceItem;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Item::class, ResourceItem::class);
    }

}