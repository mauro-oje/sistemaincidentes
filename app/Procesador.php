<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procesador extends Model{
    
    protected $table = 'procesadores';

    protected $fillable = ['marca_procesador','modelo_procesador','capacidad_procesador','core_procesador','socket_procesador',
    						'disponible','equipo_id'];

    public function usuario(){
    	return $this->belongsTo('App\User');
    }
    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }
    public function scopeBuscar($query, $modelo_procesador){
        return $query->where('modelo_procesador','LIKE',"%$modelo_procesador%");
    }
}
