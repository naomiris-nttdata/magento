<?php

namespace NTTData\Prueba\Model\ResourceModel\Designer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\Prueba\Model\Designer;
use NTTData\Prueba\Model\ResourceModel\Designer as ResourceDesigner;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Designer::class, ResourceDesigner::class);
    }

}