<?php
namespace NTTData\Prueba\Model;

use Magento\Framework\Model\AbstractModel;

class Insurance extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\Prueba\Model\ResourceModel\Insurance::class);
    }
}