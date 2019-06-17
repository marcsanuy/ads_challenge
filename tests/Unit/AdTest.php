<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Ad;

class AdTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    

    // Pending refactoring, do not use magic numbers *1

     function test_title_is_more_than_50(){
        $ad = new Ad();
        $ad->title = '12345678909876543212345678909876543211234567898765432123456789';
        $response = $ad->checkIfTitleHasMoreThan50Chart();
        $this->assertEquals($response, true);
     }

     function test_title_is_less_than_50(){
        $ad = new Ad();
        $ad->title = '1';
        $response = $ad->checkIfTitleHasMoreThan50Chart();
        $this->assertEquals($response, false);
     }

    function test_title_equal_description(){
        $ad = new Ad();
        $ad->title = 'same';
        $ad->description = 'same';
        $response = $ad->checkIfTitleAndDescriptionAreTheSame();
        $this->assertEquals($response,true);
    }

    function test_title_not_equal_description(){
        $ad = new Ad();
        $ad->title = 'same';
        $ad->description = 'not same';
        $response = $ad->checkIfTitleAndDescriptionAreTheSame();
        $this->assertEquals($response,false);
    }
// Pending refactoring, do not use magic numbers *1


   
     function test_obtain_expired_ads(){
        $ad = new Ad();
        $carbon = new \Carbon\Carbon();
        $today = $carbon->now();
        $ad->publication_date = $today->subDays($ad->daysToExpire);

        $response = $ad->checkIfAdExpireProperlyOnTheIndicatedDate();
        $this->assertEquals($response,true);
     }

     function test_obtain_not_expired_ads(){
      $ad = new Ad();
      $carbon = new \Carbon\Carbon();
      $today = $carbon->now();
      $ad->publication_date = $today->subDays($ad->daysToExpire-1);

      $response = $ad->checkIfAdExpireProperlyOnTheIndicatedDate();
      $this->assertEquals($response,false);
   }

   
     // limit 100 ads
      function test_number_of_ads_are_over_limit(){
        $ad = new Ad();
        $limit = $ad->limit;
        $ad->numberOfAds = $limit+1;
        $response = $ad->checkIfAdsAreGreaterThanLimit();
        $this->assertEquals($response, true);

      }
      function test_number_of_ads_are_under_limit(){
        $ad = new Ad();
        $limit = $ad->limit;
        $ad->numberOfAds = $limit-1;
        $response = $ad->checkIfAdsAreGreaterThanLimit();
        $this->assertEquals($response, false);

      }

    

    
}
