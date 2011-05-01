<?php

require_once 'Zend/Http/Client.php';

/**
 * Class for accessing an instance of MaPit, without having to worry
 * about HTTP requests or JSON decoding.
 */
class MaPit
{
  private $baseUri;
  
  /**
   * Create a new instance of the MaPit Lookup class.
   * 
   * @param string $baseUri Base URI for MaPit (no trailing slash).
   */
  public function __construct($baseUri)
  {
    $this->baseUri = $baseUri;
  }
  
  /**
   * Make a request to a MaPit instance.
   * 
   * @param string $path
   * @param array $parameters
   */
  private function request($path, $parameters = array())
  {
    $uri = $this->baseUri . $path;
    
    $client = new Zend_Http_Client();
    $client->setUri($uri);
    $client->setParameterGet($parameters);
    
    $response = $client->request();
    
    return $response;
  }
  
  public function getPostcode($postcode, $parameters = array())
  {
    $path = '/postcode/' . urlencode($postcode);
    
    $body = $this->request($path, $parameters)->getBody();
    
    return json_decode($body, true);
  }
  
  public function getGenerations()
  {
    $path = '/generations';
    
    $body = $this->request($path)->getBody();
    
    return json_decode($body, true);
  }
}
