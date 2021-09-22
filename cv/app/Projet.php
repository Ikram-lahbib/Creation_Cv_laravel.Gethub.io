<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    public function cv(){
		return $this->belongsTo('App\Vc');
	}
}
