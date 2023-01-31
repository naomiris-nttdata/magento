<?php

namespace NTTData\PurchaseRegret\Block;

use Magento\Sales\Api\OrderRepositoryInterface;

class OrderDetails {

   /**
    * @var OrderRepositoryInterface
    */
   protected $orderRepository;

   /**
    * OrderDetails constructor.
    * @param OrderRepositoryInterface $orderRepository
    */
   public function __construct
   (
       OrderRepositoryInterface $orderRepository
   ) {
       $this->orderRepository = $orderRepository;
   }

   /**
    * Get Order by Order ID
    * @param $id
    * @return OrderRepositoryInterface
    */
   public function getOrderDetails()
   {
    $orderId = 2;
    $order = $this->orderRepository->get($orderId);   
   }
}