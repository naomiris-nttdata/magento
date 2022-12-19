<?php
namespace NTTData\Prueba\Model;

use Magento\Framework\Model\AbstractModel;

class Designer extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\Prueba\Model\ResourceModel\Designer::class);
    }
}