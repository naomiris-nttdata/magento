<?php
namespace NTTData\Prueba\Model\Config\Source;

class TypeOfContract implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'Fixed-Term Contract', 'label' => __('Fixed-Term Contract')],
        ['value' => 'Permanent Employment Contract', 'label' => __('Permanent Employment Contract')],
        ['value' => 'Internship Employment Contract', 'label' => __('Internship Employment Contract')]

        ];
      }



  
}