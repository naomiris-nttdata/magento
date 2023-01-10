<?php
namespace NTTData\Prueba\Model\Config\Source;

class Designer implements \Magento\Framework\Option\ArrayInterface
{
private $collectionFactory;

  public function __construct(\NTTData\Prueba\Model\ResourceModel\Designer\CollectionFactory $collectionFactory
  ) {
    $this->collectionFactory = $collectionFactory;
}
  public function toOptionArray()
  {
    $collectionFac = $this->collectionFactory->create();

    $options = [['label' => 'Please select', 'value' => '' ]];
      foreach ( $collectionFac  as $item) {
          $options[] = array( 
          'label' => $item->getData('type_designer'),
          'value' => $item->getId()
        );
      }
  return $options;
  }
}