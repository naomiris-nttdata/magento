<?php
namespace NTTData\Practice\Controller\Test;
class ProductList extends \Magento\Framework\App\Action\Action
{

	protected $_pageFactory;
	private $storeManager;

    
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Store\Model\StoreManagerInterface $storeManager)
	{
		$this->storeManager = $storeManager;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$storeId = $this->storeManager->getStore()->getId();
		
		date_default_timezone_set("America/New_York");
		if($storeId == 2){
			date_default_timezone_set("America/Argentina/Buenos_Aires");
		}
		$date = date('H:i:s');
		$pageFactory = $this->_pageFactory->create();
		$pageFactory->getConfig()->getTitle()->set(__("Now being %1, I'm learning translations",$date));
		return $pageFactory;
	}
}