<?php

namespace NTTData\Prueba\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Designer extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('designer','designer_id');
    }
}