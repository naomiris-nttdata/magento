<?php
namespace NTTData\Pokemons\Cron;

use \Psr\Log\LoggerInterface;

use NTTData\Pokemons\Helper\Data;
use NTTData\ServiceApi\Service\DataApi;
use NTTData\Pokemons\Model\ItemFactory;

class Custom {
  protected $logger;
  protected $_dataApi;
  private $helper;
  protected $itemFactory;
  protected $messageManager;
  protected $collectionFactory;



  public function __construct(
    LoggerInterface $logger,
    \Magento\Framework\App\Action\Context $context,
    \NTTData\ServiceApi\Service\DataApi $dataApi,
    \NTTData\Pokemons\Model\ItemFactory $itemFactory,
    \Magento\Framework\Controller\ResultFactory $result,
    \NTTData\Pokemons\Model\ResourceModel\Item\CollectionFactory $collectionFactory,
    \Magento\Framework\Message\ManagerInterface $messageManager,
    \NTTData\Pokemons\Helper\Data $helper
) {
    $this->logger = $logger;
    $this->collectionFactory = $collectionFactory;
    $this->_dataApi = $dataApi;
    $this->helper = $helper;
    $this->itemFactory = $itemFactory;
    $this->resultRedirect = $result;
    $this->messageManager = $messageManager;
  }

  public function pokemon() 
{            
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

     
    }  
}