<?php
namespace NTTData\Prueba\Model\Config\Source;

class Insurance implements \Magento\Framework\Option\ArrayInterface
{
private $collectionFactory;

  public function __construct(\NTTData\Prueba\Model\ResourceModel\Insurance\CollectionFactory $collectionFactory
  ) {
    $this->collectionFactory = $collectionFactory;
}
  public function toOptionArray()
  {
    $collectionFac = $this->collectionFactory->create();

    $options = [['label' => 'Please select', 'value' => '' ]];
      foreach ( $collectionFac  as $item) {
          $provider = $item['provider'];
          $plan = $item['plan'];
          $label = $provider. " ". $plan;
          $options[] = array( 
          'label' => $label,
          'value' => $item->getId()
        );
      }
  return $options;
  }
}