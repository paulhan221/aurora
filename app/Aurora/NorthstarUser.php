<?php namespace Aurora;

use App;
use Aurora\Services\Drupal\DrupalAPI;
use Aurora\Services\Northstar\NorthstarAPI;
use Aurora\Services\MobileCommons\MobileCommonsAPI;

class NorthstarUser {

  public function __construct($id)
  {
    $this->northstar = App::make('Aurora\Services\Northstar\NorthstarAPI');
    $this->drupal = App::make('Aurora\Services\Drupal\DrupalAPI');
    $this->mobileCommons = App::make('Aurora\Services\MobileCommons\MobileCommonsAPI');
    $this->profile = $this->northstar->getUser('_id', $id);
  }

  public function getCampaigns() {
    $campaigns = [];
    $profile = $this->profile;

    if(isset($profile['campaigns'])){
      foreach($profile['campaigns'] as $campaign){
        if (isset($campaign['drupal_id'])) {
          array_push($campaigns, $this->drupal->getCampaignFromDrupal($campaign['drupal_id']));
        }
      }
    }
    return array_filter($campaigns);
  }

  public function getReportbacks()
  {
    $reportbacks = [];
    $profile = $this->profile;

    if(isset($profile['campaigns'])){
      foreach($profile['campaigns'] as $campaign){
        if(isset($campaign["reportback_id"])) {
          array_push($reportbacks, $this->drupal->getReportbacksFromDrupal($campaign['reportback_id']));
        }
      }
    }
    return array_filter($reportbacks);
  }

  public function getMobileCommonsProfile()
  {
    if(isset($this->profile['mobile']))
    {
      return $this->mobileCommons->userProfile($this->profile['mobile']);
    }
  }

  public function getMobileCommonsMessages()
  {
    return $this->mobileCommons->userMessages($this->profile['mobile']);
  }

  public function isAdmin($id) {
    return \User::where('_id', $id)->first();
  }

}