<?php

namespace NTTData\Prueba\Model\ResourceModel\Language;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\Prueba\Model\Language;
use NTTData\Prueba\Model\ResourceModel\Language as ResourceLanguage;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(Language::class, ResourceLanguage::class);
    }

}