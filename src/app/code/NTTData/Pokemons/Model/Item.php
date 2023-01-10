<?php
namespace NTTData\Pokemons\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\Pokemons\Model\ResourceModel\Item::class);
    }
}