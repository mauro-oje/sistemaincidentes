<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model{
    
    protected $table = 'areas';

    protected $fillable = ['nombre_area'];

    public function oficinas(){
    	return $this->hasMany('App\oficina');
    }

}
