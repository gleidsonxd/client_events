<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{	
	/**
     * Events pertence a service
     */
    public function services()
    {
    	return $this->belongsToMany('App\Service');
    }
}
