<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model{

    protected $table = 'comentarios';

    protected $fillable = ['comentario','user_id','incidente_id'];
    
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function incidente(){
    	return $this->belongsTo('App\Incidente');
    }

    /*
    public function incidenteUsuario(){
    	return $this->belongsTo('App\Incidente_Usuario');
    }
    */
}
