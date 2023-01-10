<?php
namespace NTTData\Prueba\Model\Config\Source;

class Options implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'Programmer', 'label' => __('Programmer')],
        ['value' => 'Designer', 'label' => __('Designer')]
        ];
      }



  
}