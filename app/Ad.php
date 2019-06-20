<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $numberOfAds = 99;
    public $limit = 100;
    public $today;
    public $daysToExpire = 29;
    
    
    protected $fillable = [
        'title', 'description', 'publication_date'
    ];

    public function checkIfTitleAndDescriptionAreTheSame(){
        if($this->title ==  $this->description){
            return true;
        }

        return false;

    }
    


    public function checkIfTitleHasMoreThanLimitChart(){

        if (strlen($this->title) >50 ){
            return true;
        }

        return false;
    }



    public function checkIfAdExpireProperlyOnTheIndicatedDate(){
        $carbon = new \Carbon\Carbon();
        $today = $carbon->now();

        if($this->publication_date <= $today->subDays($this->daysToExpire) ){
            return true;
        }
            return false;

    }



    public function checkIfAdsAreGreaterThanLimit(){
        if($this->numberOfAds > $this->limit) {
            return true;
        }

        return false;
        
    }
    
}
