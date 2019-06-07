<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
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

        if(strlen($this->title) >50 ){
            return true;
        }

        return false;
    }
    
}
