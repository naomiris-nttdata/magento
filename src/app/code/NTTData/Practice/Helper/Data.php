<?php

namespace NTTData\Practice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const XML_PATH_PRACTICE = 'practice/general/';

	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function IsEnabled($storeId = null)
	{
		$result = $this->getConfigValue(self::XML_PATH_PRACTICE.'enabled', $storeId);
		return $result;
	}

	public function GetLimitValue($storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_PRACTICE.'limit', $storeId);
	}
	public function GetOrderDirectionValue($storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_PRACTICE.'order_direction', $storeId);
	}
	public function GetOrderFieldAttributeValue($storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_PRACTICE.'order_field', $storeId);

	}

}