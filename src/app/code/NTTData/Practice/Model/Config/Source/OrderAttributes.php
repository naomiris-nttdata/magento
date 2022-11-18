<?php
namespace NTTData\Practice\Model\Config\Source;

class OrderAttributes implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'activity', 'label' => __('activity')],
    ['value' => 'category_gear', 'label' => __('category_gear')],
    ['value' => 'category_ids', 'label' => __('category_ids')],
    ['value' => 'climate', 'label' => __('climate')],
    ['value' => 'collar', 'label' => __('collar')],
    ['value' => 'color', 'label' => __('color')],
    ['value' => 'cost', 'label' => __('cost')],
    ['value' => 'country_of_manufacture', 'label' => __('contry_of_manufacture')],
    ['value' => 'custom_design', 'label' => __('custom_design')],
    ['value' => 'custom_design_from', 'label' => __('custom_design_from')],
    ['value' => 'custom_design_to', 'label' => __('custom_design_to')],
    ['value' => 'custom_layout', 'label' => __('custom_layout')],
    ['value' => 'custom_layout_update_file', 'label' => __('custom_layout_update_file')],
    ['value' => 'description', 'label' => __('description')],
    ['value' => 'eco_collection', 'label' => __('eco_collection')],
    ['value' => 'erin_recommends', 'label' => __('erin_recommends')],
    ['value' => 'features_bags', 'label' => __('features_bags')],
    ['value' => 'format', 'label' => __('format')],
    ['value' => 'gallery', 'label' => __('gallery')],
    ['value' => 'gender', 'label' => __('gender')],
  ];
 }
}