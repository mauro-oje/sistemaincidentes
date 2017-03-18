<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model{

	protected $table = 'ips';

    protected $fillable = ['direccion','disponible','equipo_id','impresora_id'];
    
    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }

    public function impresora(){
    	return $this->belongsTo('App\Impresora');
    }
}
