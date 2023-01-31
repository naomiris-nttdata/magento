<?php
namespace NTTData\PurchaseRegret\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Formdata extends \Magento\Framework\App\Action\Action
{
    protected $orderCollectionFactory;
    protected $orderRepository;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Sales\Model\OrderRepository $orderRepository,
        \Magento\Sales\Model\Order $order,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
        
    )	
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->order = $order;
        $this->orderRepository = $orderRepository;
        $this->orderCollectionFactory =$orderCollectionFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
        $resultJson = $this->resultJsonFactory->create();

        $PostValue = $this->getRequest()->getPost();
        $orderId = $PostValue['order_id'];
        $orderEmail = $PostValue['email'];
        $orderName = $PostValue['name'];
        $orderSurname = $PostValue['surname'];
        $orderComment = $PostValue['comment'];

        

        $orderCollection = $this->orderCollectionFactory->create();
        $orderCollection->addAttributeToFilter('increment_id', ['eq' => $orderId]);
        $ordersData = $orderCollection->getData();       

        if(empty($ordersData)){
            $resultJson->setData([
                'success' => 'error', 'message'=> __("Check your data please, your ID is incorrect")
            ]);
            }else{
             foreach($ordersData as $item){
                 $customerEmail= $item['customer_email'];
                 $incrementID=  $item['increment_id'];
                 $customerFirstName= $item['customer_firstname'];
                 $customerLastName= $item['customer_lastname'];
             }
             foreach ($orderCollection as $orderItem){
                $purchaseState = $orderItem['state']; 
                $purchasedDate = $orderItem['updated_at'];   
             }
           
             if($incrementID == $orderId){
                 if($customerFirstName !== $orderName){
                    $resultJson->setData([
                        'success' => 'error', 'message'=> __("Check your data please, you entered something wrong")
                    ]);  
                }else if($customerLastName !== $orderSurname){
                    $resultJson->setData([
                        'success' => 'error', 'message'=> __("Check your data please, you entered something wrong")
                    ]); 
                 }else if($customerEmail !== $orderEmail){
                    $resultJson->setData([
                        'success' => 'error', 'message'=> __("Check your data please, you entered something wrong")
                    ]); 
                }else{
                    if($purchaseState !== 'complete' && $purchaseState !== 'canceled' && $purchaseState !== 'pending_devolution'){
                        $order = $this->order->load($orderId);
                        $order->setStatus("pending_devolution");
                        $order->setState("pending_devolution");
                        $order->save();
    
                        $order = $this->orderRepository->get($orderId);
                        $order->addCommentToStatusHistory($orderComment);
                        $this->orderRepository->save($order);
                        $resultJson->setData([
                          'success' => true, 'message' => __("Congrats your product can be refound you will be notify with next steps")
                        ]); 
                        }else if( $purchaseState == 'complete'){
                        $today = date('Y-m-d H:i:s');
                        $dateNow = date($today);
                        $datePurchased = date($purchasedDate);
                        
                        $datePurchasedSeconds = strtotime($datePurchased);
                        $dateNowSeconds = strtotime($dateNow);
                        $date = ($datePurchasedSeconds - $dateNowSeconds) / 8640;
                        $daysPassed = round($date, 0, PHP_ROUND_HALF_UP);
                        if($daysPassed > 10){
                            return $resultJson->setData([
                                'success' => true, 'message'=> __("Sorry! Your product cannot be refound, 10 days has passed since your purchase")
                            ]);                      
                           
                        }else {
                            $order = $this->order->load($orderId);
                            $order->setStatus("pending_devolution");
                            $order->setState("pending_devolution");
                            $order->save();
        
                            $order = $this->orderRepository->get($orderId);
                            $order->addCommentToStatusHistory($orderComment);
                            $this->orderRepository->save($order);
                            $resultJson->setData([
                                'success' => true, 'message' => __("Congrats! your product can be refound you will be notify with next steps")
                            ]);  
                           
                        }                         
                    }elseif($purchaseState == 'canceled'){
                            $resultJson->setData([
                                'success'=> true, 'message' => __("The status of your product is canceled, we cannot refound your product")
                            ]);  
                    }elseif($purchaseState == 'pending_devolution'){
                       return $resultJson->setData([
                        'success'=> true, 'message' => __("The status of your product is already pending of devolution, please check your email for further notice. Thank you!")
                        ]);
                    }
                }
            }
        }
        return $resultJson;
  
    }
} 
