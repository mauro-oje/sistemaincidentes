<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscoDuro extends Model{
    
    protected $table = 'discos_duros';

    protected $fillable = ['tipo_disco','marca_disco','modelo_disco','capacidad_disco','interface','disponible','equipo_id'];
    
    public function equipo(){
    	return $this->belongsTo('App\equipo');
    }
    public function scopeBuscar($query, $marca_disco){
        return $query->where('marca_disco','LIKE',"%$marca_disco%");
    }
    
}
