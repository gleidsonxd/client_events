<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{	
	 /**
     * Service pertence a events
     */
	public function events()
	{
		return $this->belongsToMany('App\Events');
	}
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   	protected $fillable = [
        'name', 'prep_time', 'department'
    ];
}
