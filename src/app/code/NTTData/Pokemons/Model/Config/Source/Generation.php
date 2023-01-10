<?php
namespace NTTData\Pokemons\Model\Config\Source;

class Generation implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'generation-i', 'label' => __('Generation I')],
        ['value' => 'generation-ii', 'label' => __('Generation II')],
        ['value' => 'generation-iii', 'label' => __('Generation III')],
        ['value' => 'generation-iv', 'label' => __('Generation IV')],
        ['value' => 'generation-v', 'label' => __('Generation V')],
        ['value' => 'generation-vi', 'label' => __('Generation VI')],
        ['value' => 'generation-vii', 'label' => __('Generation VII')],
        ['value' => 'generation-viii', 'label' => __('Generation VIII')],

        ];
      }



  
}