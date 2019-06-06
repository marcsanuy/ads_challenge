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

    // function title_max_leght_50(){

    // }

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

    // function expiration_ad_date(){

    // }

    // function maximum_ads_100(){

    // }

    // function delete_ads_greater_than_100(){

    // }

    // function delete_older_ad(){

    // }
}
