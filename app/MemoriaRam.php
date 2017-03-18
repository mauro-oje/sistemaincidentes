<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\MemoriaRam;
//use\App\Equipo;

class MemoriaRam extends Model{
    
     protected $table = 'memorias_ram';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_memoria','marca_memoria','capacidad_memoria','frecuencia','disponible','equipo_id'];

    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }
    public function scopeBuscar($query, $marca_memoria){
        return $query->where('marca_memoria','LIKE',"%$marca_memoria%");
    }

}
