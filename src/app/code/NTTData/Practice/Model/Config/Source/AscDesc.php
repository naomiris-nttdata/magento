<?php
namespace NTTData\Practice\Model\Config\Source;

class AscDesc implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'ASC', 'label' => __('ASC')],
    ['value' => 'DESC', 'label' => __('DESC')]
  ];
 }
}
