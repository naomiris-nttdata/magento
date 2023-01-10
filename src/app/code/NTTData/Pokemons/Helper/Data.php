<?php

namespace NTTData\Pokemons\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const XML_PATH_PRACTICE = 'url/general/';

	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function url($storeId = null)
	{
		$result = $this->getConfigValue(self::XML_PATH_PRACTICE.'url_api', $storeId);
		return $result;
	}

}