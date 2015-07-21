<?php namespace Aurora\Services\MobileCommons;

use GuzzleHttp\Client;

class MobileCommonsAPI {

  protected $client;

  public function __construct()
  {
    $base_url = "https://secure.mcommons.com/api/profile";

    $username = \Config::get('services.mobile_commons.username');

    $password = \Config::get('services.mobile_commons.password');

    $client = new \GuzzleHttp\Client([
      'base_url' => $base_url,
      'defaults' => array(
      'auth' => [$username, $password, 'Basic']
        ),
    ]);

    $this->client = $client;
  }

  public function userProfile($mobile) 
  {
    $response = $this->client->get('?phone_number=' . $mobile . '&include_messages=true');

    $xml = $response->xml();

    $json = json_encode($xml);
 
    $array = json_decode($json, TRUE);

    if (!empty($array['error'])){
      return array();
    } else {
      return $array['profile'];
    }
  }

  public function userMessages($mobile)
  {
    $profile = $this->userProfile($mobile);

    if (!empty($profile)) {
      return $profile['messages']['message'];
    } else {
      return [];
    }
  }

}