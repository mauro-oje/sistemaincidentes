<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuente extends Model{

    protected $table = 'fuentes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['marca_fuente','modelo_fuente','capacidad_fuente','disponible','equipo_id'];

    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }
        public function scopeBuscar($query, $marca_fuente){
        return $query->where('marca_fuente','LIKE',"%$marca_fuente%");
    }
}
