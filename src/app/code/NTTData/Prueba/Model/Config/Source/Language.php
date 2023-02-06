<?php
namespace NTTData\Prueba\Model\Config\Source;

class Language implements \Magento\Framework\Option\ArrayInterface
{
private $collectionFactory;

  public function __construct(\NTTData\Prueba\Model\ResourceModel\Language\CollectionFactory $collectionFactory
  ) {
    $this->collectionFactory = $collectionFactory;
}
  public function toOptionArray()
  {
    $collectionFac = $this->collectionFactory->create();

    $options = [['label' => 'Please select', 'value' => '' ],['label' => 'Im not a programmer', 'value' => '' ]];
      foreach ( $collectionFac  as $item) {
          $options[] = array( 
          'label' => $item->getName(),
          'value' => $item->getId()
        );
      }
  return $options;
  }
}