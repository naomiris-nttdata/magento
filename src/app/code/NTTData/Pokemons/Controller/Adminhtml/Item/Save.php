<?php

namespace NTTData\Pokemons\Controller\Adminhtml\Item;

use NTTData\Pokemons\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    private $itemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $itemFactory
    ) {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
       $model = $this->itemFactory->create();
            $data=$this->getRequest()->getPostValue()['general'];
            $name = $data['name'];
            $pokeType = implode(',',$data['poke_type']);
            $generation = implode(',',$data['generation']);
            $regionName = implode(',',$data['region_name']);
            $model->addData([
                "name" => $name,
                "poke_type" => $pokeType,
                "generation" => $generation,
                "region_name" => $regionName,
			]);
            $saveData = $model->save(); 
            
        
        return $this->resultRedirectFactory->create()->setPath('pokemons/index/index');
    }
}