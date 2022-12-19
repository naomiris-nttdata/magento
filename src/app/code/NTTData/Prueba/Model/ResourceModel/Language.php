<?php

namespace NTTData\Prueba\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Language extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('language','language_id');
    }
}