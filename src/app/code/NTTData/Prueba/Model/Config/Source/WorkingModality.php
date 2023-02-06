<?php
namespace NTTData\Prueba\Model\Config\Source;

class WorkingModality implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'Part time', 'label' => __('Part-Time')],
        ['value' => 'Freelance', 'label' => __('Freelance')],
        ['value' => 'Full time', 'label' => __('Full-Time')]

        ];
      }



  
}