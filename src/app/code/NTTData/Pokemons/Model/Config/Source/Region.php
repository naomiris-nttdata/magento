<?php
namespace NTTData\Pokemons\Model\Config\Source;

class Region implements \Magento\Framework\Option\ArrayInterface
{

      public function toOptionArray()
      {
      return [
        ['value' => '', 'label' => __('')],
        ['value' => 'kanto', 'label' => __('kanto')],
        ['value' => 'johto', 'label' => __('johto')],
        ['value' => 'hoenn', 'label' => __('hoenn')],
        ['value' => 'sinnoh', 'label' => __('sinnoh')],
        ['value' => 'unova', 'label' => __('unova')],
        ['value' => 'kalos', 'label' => __('kalos')],
        ['value' => 'alola', 'label' => __('alola')],
        ['value' => 'galar', 'label' => __('galar')],
        ['value' => 'hisui', 'label' => __('hisui')],
        ];
      }



  
}