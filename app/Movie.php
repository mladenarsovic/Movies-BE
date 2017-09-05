<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode($value);
    }
	
	public function getGenresAttribute($value)
    	{
        	return json_decode($value, true);
    	}

}
