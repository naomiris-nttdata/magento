<?php
namespace NTTData\Prueba\Model\Config\Source;

class Seniority implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'Junior', 'label' => __('Junior')],
        ['value' => 'Junior Advance', 'label' => __('Junior Advance')],
        ['value' => 'Semi Senior', 'label' => __('Semi Senior')],
        ['value' => 'Senior', 'label' => __('Senior')]

        ];
      } 
}