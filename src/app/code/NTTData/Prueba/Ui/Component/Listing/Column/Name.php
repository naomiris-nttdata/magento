<?php
namespace NTTData\Prueba\Ui\Component\Listing\Column;
 
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
 
class Name extends Column
{
    protected $collectionFactory;
    /**
     * 
     * @param ContextInterface   $context           
     * @param UiComponentFactory $uiComponentFactory  
 
     * @param array              $components        
     * @param array              $data              
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \NTTData\Prueba\Model\ResourceModel\Language\CollectionFactory $collectionFactory,        
        array $components = [],
        array $data = []
    ){
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
 
    /**
     *
     * @param array $dataSource
     * @return array
     */
     public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {            
                $item[$this->getData('name')] = $this->prepareItem($item);       
            }
        }
        return $dataSource;   
    } 

     /**
     * Get data.
     *
     * @param array $item
     *
     * @return string
     */
      protected function prepareItem(array $item) {
            $ids = $item['id_language'];
            $name = '';
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter('language_id',$ids);
            foreach ($collection as $each){
                $name = $each->getName();
            }        
        return $name;
   } 
}
 



/* 
 if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collectionFactory->create();
        foreach ($items as $model) {
            $this->items[$model->getId()] = $model->getData();
        }
        var_dump($this->loadedData);
        return $this->loadedData;
 */

/* $item['id_language']; 
var_dump($item->getData('id_language'));
exit;
$collection = $this->collectionFactory->create();
$collection->addFieldToFilter('language_id',$ids);

$data = $collection->getItems();



$item[$this->getData('name')] = $data->getName();  */