<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UserProfileFetcher {
    private $client;
    private $url = 'https://playground.dev-core.stream/sample.json';

    public function __construct() {
        $this->client = new Client();
    }

    public function fetchProfiles() {
        try {
            $response = $this->client->request('GET', $this->url);
            $body = $response->getBody();
            $profiles = json_decode($body);
            return $profiles;
        } catch (GuzzleException $e) {
            // Handle the error appropriately
            // For the purpose of this example, we will just return null
            return null;
        }
    }
}
