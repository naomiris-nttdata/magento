<?php
namespace NTTData\Prueba\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\Prueba\Model\ResourceModel\Item::class);
    }
}