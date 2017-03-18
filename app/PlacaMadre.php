<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlacaMadre extends Model{
    
	protected $table = 'placas_madres';

    protected $fillable = ['marca_placa','modelo_placa','version','disponible','equipo_id'];

    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }
    public function scopeBuscar($query, $marca_placa){
        return $query->where('marca_placa','LIKE',"%$marca_placa%");
    }

}
