<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model{
    
    protected $table = 'impresoras';

    protected $fillable = ['marca_impresora','modelo_impresora','tipo_impresora','direccion_ip','disponible','equipo_id'];

    public function equipo(){
    	return $this->belongsTo('App\Equipo');
    }
    public function ip(){
    	return $this->hasOne('App\Ip');
    }
    public function scopeBuscar($query, $marca_impresora){
        return $query->where('marca_impresora','LIKE',"%$marca_impresora%");
    }
}
