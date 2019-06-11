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

    // function form_not_empty(){

    // }

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


   
     function test_ads_expire_past_date_expiration(){
        $ad = new Ad();
        $ad->title = 'expire';
        $ad->description = 'expiredate';
        $ad->date = '';
        $response = $ad->checkIfAdExpireProperlyOnTheIndicatedDate();
        $this->assertEquals($response,true);
     }

     // limit 100 ads
    //  function test_maximum_ads_limit(){
        

    //  }

    //  function test_delete_ads_greater_than_limit(){

    //  }

    //  function test_delete_older_ad(){

    //  }
}
