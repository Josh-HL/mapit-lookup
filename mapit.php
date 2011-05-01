<?php

require_once 'Zend/Http/Client.php';

class MaPit
{
  private $baseUri;
  
  public function __construct($baseUri)
  {
    $this->baseUri = $baseUri;
  }
  
  public function getPostcode($postcode, $parameters = array())
  {
    $uri = $this->baseUri . '/postcode/' . urlencode($postcode);
    
    $client = new Zend_Http_Client();
    $client->setUri($uri);
    $client->setParameterGet($parameters);
    
    $response = $client->request();
    
    $body = $response->getBody();
    
    return json_decode($body, true);
  }
}
