<?php
namespace NTTData\Pokemons\Controller\Adminhtml\Pokemon;

use NTTData\Pokemons\Helper\Data;
use NTTData\ServiceApi\Service\DataApi;
use NTTData\Pokemons\Model\ItemFactory;

class Loader extends \Magento\Framework\App\Action\Action
{
    protected $_dataApi;
    private $helper;
    protected $itemFactory;
    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \NTTData\ServiceApi\Service\DataApi $dataApi,
        \NTTData\Pokemons\Model\ItemFactory $itemFactory,
        \NTTData\Pokemons\Model\ResourceModel\Item\CollectionFactory $collectionFactory,
        \Magento\Framework\Controller\ResultFactory $result,
        \NTTData\Pokemons\Helper\Data $helper
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->_dataApi = $dataApi;
        $this->helper = $helper;
        $this->itemFactory = $itemFactory;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

    public function execute()
    {
        try{            
            $collectionFac = $this->collectionFactory->create();
            if(empty($collectionFac->getData())){
                $offset = "0";   
            }else{
                foreach($collectionFac as $item){
                    $id[] = $item['id'];
                }
                    $lastId = end($id);
                    $offset = intval($lastId);
            }
            $offsetDinamic = "{$this->helper->url()}{$offset}";

            $collection = $this->_dataApi->apiCall($offsetDinamic,'GET');
            $objeto = json_decode($collection, true);
            $resultsArr = $objeto['results'];
            
            for($i = 0; $i < sizeof($resultsArr); $i++){
                $name = $resultsArr[$i]['name'];
                $collectionPoke = $this->_dataApi->apiCall($resultsArr[$i]['url'],'GET');
                $obj = json_decode($collectionPoke, true);

                $location_area_encounters = $obj['location_area_encounters'];
                $locationAreaCollection = $this->_dataApi->apiCall($location_area_encounters,'GET');
                $objLocation = json_decode($locationAreaCollection, true);
                if(empty($objLocation)){
                    $region = '';
                }else {
                    foreach($objLocation as $location){ 
                      $location_area_url = $location['location_area']['url'];
                      $locationCall = $this->_dataApi->apiCall($location_area_url,'GET');
                      $objLocationCall = json_decode($locationCall, true);

                      $regionUrl = $objLocationCall['location']['url'];
                     
                      $regionCall = $this->_dataApi->apiCall($regionUrl,'GET');
                      $objRegionCall = json_decode($regionCall, true);

                      $regionName[] = $objRegionCall['region']['name'];
                      $regionArr = array_unique($regionName);
                      $region = implode(',', $regionArr);
                    }
                    unset($regionName);
               }
                $generationArray = array_keys($obj['sprites']['versions']);
                $generation = implode(',',$generationArray);

                $type1 = $obj['types'][0]['type']['name'];
                if(empty($obj['types'][1]['type']['name'])){
                    $pokeType = $type1;
                }else{ 
                    $pokeType = "{$type1},{$obj['types'][1]['type']['name']}";
                }

                $model = $this->itemFactory->create();
                $model->addData([
                    "name" => $name,
                    "poke_type" => $pokeType,
                    "generation" => $generation,
                    "region_name" => $region 
                ]);
                $saveData = $model->save();     
            }
            exit;
            if($saveData){
    
                $this->messageManager->addSuccess( __('Insert data Successfully !') );
            
            }
        }catch (\Exception $e) {
                    $this->messageManager->addError(__($e->getMessage()));
                }
         
                $this->_redirect('*/index/index');     
    }  
    
}        
