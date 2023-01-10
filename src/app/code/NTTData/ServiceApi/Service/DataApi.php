<?php

namespace NTTData\ServiceApi\Service;

class DataApi 
{

  public function __construct()
  {
      $this->baseUrl = 'https://pokeapi.co/api/v2/';
  }

  public function resourceList($endpoint, $limit = null, $offset = null)
  {
      $url = $this->baseUrl.$endpoint.'/?limit='.$limit.'&offset='.$offset;
      $customerRequest = 'GET';

      return $this->apiCall($url, $customerRequest);
  }

  public function pokemon($id)
  {
      $url = $this->baseUrl.'pokemon/'.$id;
      $customerRequest = 'GET';
      return $this->apiCall($url, $customerRequest);
  }

    public function apiCall( $url, $customerRequest)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $customerRequest,
          CURLINFO_HEADER_OUT => true,
          CURLOPT_HTTPHEADER => [],
          CURLOPT_POSTFIELDS => [],
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return $response;
    }
}