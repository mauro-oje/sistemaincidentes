<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model{

	protected $table = 'incidentes';

    protected $fillable = ['tipo_incidente','descripcion_incidente','prioridad','estado'];

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
    
}
