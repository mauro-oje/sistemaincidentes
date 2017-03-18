<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model{

    protected $table = 'oficinas';

    protected $fillable = ['oficina','area_id'];

    public function area(){
    	return $this->belongsTo('App\Area');
    }

    public function usuarios(){
    	return $this->hasMany('App\User');
    }
    
}
