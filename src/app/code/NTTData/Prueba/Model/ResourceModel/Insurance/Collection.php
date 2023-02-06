<?php

namespace NTTData\Prueba\Model\ResourceModel\Insurance;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\Prueba\Model\Insurance;
use NTTData\Prueba\Model\ResourceModel\Insurance as ResourceInsurance;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Insurance::class, ResourceInsurance::class);
    }

}