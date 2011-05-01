<?php

require_once 'Zend/Http/Client.php';

class MaPit
{
  private $baseUri;
  
  public function __construct($baseUri)
  {
    $this->baseUri = $baseUri;
  }
  
  private function request($uri, $parameters = array())
  {
    $uri = $this->baseUri . $uri;
    
    $client = new Zend_Http_Client();
    $client->setUri($uri);
    $client->setParameterGet($parameters);
    
    $response = $client->request();
    
    return $response;
  }
  
  public function getPostcode($postcode, $parameters = array())
  {
    $uri = '/postcode/' . urlencode($postcode);
    
    $body = $this->request($uri, $parameters)->getBody();
    
    return json_decode($body, true);
  }
  
  public function getGenerations()
  {
    $uri = '/generations';
    
    $body = $this->request($uri)->getBody();
    
    return json_decode($body, true);
  }
}
