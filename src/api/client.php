<?php
namespace Digitales\LaravelMondo\Api;

use GuzzleHttp\ClientInterface;

class client {
    
    protected $HttpClient;
    
    protected $headers;
    
    protected $token;
    
    protected $refreshToken;
    
    protected $apiUrl;
    
    public function __construct( $token = null, $refreshToken, $client = null )
    {
        $this->token = $token;
        $this->refreshToken = $refreshToken;
        $this->httpClient = $client;    
    }
    
    
    public function setApiUrl( $url )
    {
        $this->apiUrl;
        return $this;
    }
    
    
    public function getApiUrl()
    {
        return $this->apiUrl;
    }
    
    
    /**
     *  Get a fresh instance of the Guzzle HTTP client.
     *
     *  @param boolean $forceNew Force a new instance of the http client
     *  
     *  @return \GuzzleHttp\Client
     */
    protected function getHttpClient( $forceNew = false)
    {
        if (!$this->httpClient && false == $forceNew ) {
            $this->httpClient = new \GuzzleHttp\Client;
        }
        
        return $this->httpClient;
    }
    
    
    protected function assembleHeaders()
    {
        return ['Accept' => 'application/json',
                'Authorization' => 'Bearer '.$this->getToken(),
               ];
    }
    
    
    protected function getToken()
    {
        return $this->token;
    }
    
    
    
    public function get( $requestUrl, $payload = null, $token = null )
    {        
        $response = $this->getHttpClient()->get( $requestUrl, [
            'query' => [
                'prettyPrint' => 'false',
            ],
            'headers' => $this->assembleHeaders(),
        ]);

        return json_decode($response->getBody(), true);
    }
    
    
    
    public function post( $requestUrl, $payload )
    {
        $headers = $this->assembleHeaders();
        
    }
    
    public function delete( $requestUrl, $payload )
    {
        $headers = $this->assembleHeaders();
        
    }
    
    public function put( $requestUrl, $payload )
    {
        $headers = $this->assembleHeaders();
        
    }
    
    public function patch( $requestUrl, $payload )
    {
        $headers = $this->assembleHeaders();
        
    }
    
}