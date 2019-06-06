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
}
