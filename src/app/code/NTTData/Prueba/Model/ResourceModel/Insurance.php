<?php

namespace NTTData\Prueba\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Insurance extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('insurance','insurance_id');
    }
}