<?php
namespace NTTData\Prueba\Ui\Component\Listing\Column;
 
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
 
class Designer extends Column
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
        \NTTData\Prueba\Model\ResourceModel\Designer\CollectionFactory $collectionFactory,        
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
            $ids = $item['id_designer'];
            $data = '';
            $collection = $this->collectionFactory->create();
            $collection->addFieldToFilter('designer_id',$ids);
            foreach ($collection as $each){
                $data = $each['type_designer']; 
            }
               
        return $data;
   } 
}