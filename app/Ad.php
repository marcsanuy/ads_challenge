<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $numberOfAds = 99;
    public $limit = 100;
    
    
    protected $fillable = [
        'title', 'description', 'publication_date'
    ];

    public function checkIfTitleAndDescriptionAreTheSame(){
        if($this->title ==  $this->description){
            return true;
        }

        return false;

    }

    public function checkIfTitleHasMoreThan50Chart(){

        if (strlen($this->title) >50 ){
            return true;
        }

        return false;
    }

    public function checkIfAdExpireProperlyOnTheIndicatedDate(){

       return true;
        
    }

    public function checkIfAdsAreGreaterThanLimit(){
        if($this->numberOfAds > $this->limit) {
            return true;
        }
        return false;
        
    }
    
}
