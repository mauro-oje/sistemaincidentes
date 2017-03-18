<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipo extends Model{
    
    protected $table = 'equipos';

    protected $fillable = ['tipo','nombre_equipo','so','descripcion','user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function placaMadre(){
    	return $this->hasOne('App\PlacaMadre');
    }
    public function procesador(){
        return $this->hasOne('App\Procesador');
    }
    public function memoriasRam(){
        return $this->hasMany('App\MemoriaRam');
    }
    public function discosDuros(){
        return $this->hasOne('App\DiscoDuro');
    }
    public function impresora(){
        return $this->hasOne('App\Impresora');
    }
    public function ips(){
        return $this->hasOne('App\Ip');
    }
    public function fuente(){
        return $this->hasOne('App\Fuente');
    }
    public function scopeBuscar($query, $nombre_equipo){
        return $query->where('nombre_equipo','LIKE',"%$nombre_equipo%");
    }

    public function editarPlaca($id_equipo,$id_placa){
        $consulta_placa = db::selectOne('select * FROM placas_madres where equipo_id ='.$id_equipo);
        if($consulta_placa){
            if($consulta_placa->id != $id_placa){         
                $placa_anterior = PlacaMadre::find($consulta_placa->id);
                $placa_anterior->disponible = "si";
                $placa_anterior->equipo_id = NULL;
                $placa_anterior->save();

                $placa = PlacaMadre::find($id_placa);
                $placa->disponible = "no";
                $placa->equipo_id = $id_equipo;
                $placa->save();
            }
        }else{
            $placa = PlacaMadre::find($id_placa);
            $placa->disponible = "no";
            $placa->equipo_id = $id_equipo;
            $placa->save();
        }
    }

    public function editarProcesador($id_equipo,$id_procesador){
        $consulta_procesador = db::selectOne('select * FROM procesadores where equipo_id ='.$id_equipo);
        if($consulta_procesador){
            if($consulta_procesador->id != $id_procesador){         
                $procesador_anterior = Procesador::find($consulta_procesador->id);
                $procesador_anterior->disponible = "si";
                $procesador_anterior->equipo_id = null;
                $procesador_anterior->save();

                $procesador = Procesador::find($id_procesador);
                $procesador->disponible = "no";
                $procesador->equipo_id = $id_equipo;
                $procesador->save();
            }
        }else{
            $procesador = Procesador::find($id_procesador);
            $procesador->disponible = "no";
            $procesador->equipo_id = $id_equipo;
            $procesador->save();
        }
    }

    public function editarMemoria($id_equipo,$id_memoria,$id_memoria2){
        dd($id_memoria2);
        $c_memoria = db::select('select * FROM memorias_ram where equipo_id ='.$id_equipo);
        dd($c_memoria);
        if($c_memoria){
            if($c_memoria->id != $id_memoria){         
                $memoria_anterior = MemoriaRam::find($c_memoria->id);
                $memoria_anterior->disponible = "si";
                $memoria_anterior->equipo_id = null;
                //$memoria_anterior->save();

                $memoria = MemoriaRam::find($id_memoria);
                $memoria->disponible = "no";
                $memoria->equipo_id = $id_equipo;
                //$memoria->save();
            }
        }else{
            $memoria = MemoriaRam::find($id_memoria);
            $memoria->disponible = "no";
            $memoria->equipo_id = $id_equipo;
            $memoria->save();
        }
    }

    public function editarDisco($id_equipo,$id_disco){
        $consulta_disco = db::selectOne('select * FROM discos_duros where equipo_id ='.$id_equipo);
        if($consulta_disco){
            if($consulta_disco->id != $id_disco){         
                $disco_anterior = Procesador::find($consulta_disco->id);
                $disco_anterior->disponible = "si";
                $disco_anterior->equipo_id = null;
                $disco_anterior->save();

                $disco = Procesador::find($id_disco);
                $disco->disponible = "no";
                $disco->equipo_id = $id_equipo;
                $disco->save();
            }
        }else{
            $disco = DiscoDuro::find($id_disco);
            $disco->disponible = "no";
            $disco->equipo_id = $id_equipo;
            $disco->save();
        }
    }

    public function editarImpresora($id_equipo,$id_impresora){
        //dd($id_equipo,$id_impresora);
        $consulta_impresora = db::selectOne('select * FROM impresoras where equipo_id ='.$id_equipo);
        if($consulta_impresora){
            if($consulta_impresora->id != $id_impresora){         
                $impresora_anterior = Impresora::find($consulta_impresora->id);
                $impresora_anterior->disponible = "si";
                $impresora_anterior->equipo_id = null;
                $impresora_anterior->save();

                $impresora = Impresora::find($id_impresora);
                $impresora->disponible = "no";
                $impresora->equipo_id = $id_equipo;
                $impresora->save();
            }
        }elseif($id_impresora != "null"){
            $impresora = Impresora::find($id_impresora);
            $impresora->disponible = "no";
            $impresora->equipo_id = $id_equipo;
            $impresora->save();
        }
    }

    public function editarIp($id_equipo,$id_ip){
        $consulta_ip = db::selectOne('select * FROM ips where equipo_id ='.$id_equipo);
        if($consulta_ip){
            if($consulta_ip->id != $id_ip){         
                $ip_anterior = Ip::find($consulta_ip->id);
                $ip_anterior->disponible = "si";
                $ip_anterior->equipo_id = null;
                $ip_anterior->save();

                $ip = Ip::find($id_ip);
                $ip->disponible = "no";
                $ip->equipo_id = $id_equipo;
                $ip->save();
            }
        }else{
            $ip = Ip::find($id_ip);
            $ip->disponible = "no";
            $ip->equipo_id = $id_equipo;
            $ip->save();
        }
    }

    public function editarFuente($id_equipo,$id_fuente){
        $consulta_fuente = db::selectOne('select * FROM fuentes where equipo_id ='.$id_equipo);
        if($consulta_fuente){
            if($consulta_fuente->id != $id_fuente){         
                $fuente_anterior = Fuente::find($consulta_fuente->id);
                $fuente_anterior->disponible = "si";
                $fuente_anterior->equipo_id = null;
                $fuente_anterior->save();

                $fuente = Fuente::find($id_fuente);
                $fuente->disponible = "no";
                $fuente->equipo_id = $id_equipo;
                $fuente->save();
            }
        }else{
            $fuente = Fuente::find($id_fuente);
            $fuente->disponible = "no";
            $fuente->equipo_id = $id_equipo;
            $fuente->save();
        }
    }

    // METODOS PARA LA ELIMINACIÓN DE LOS EQUIPOS.

    public function eliminarPlaca($id_equipo){
        $consulta_placa = PlacaMadre::where('equipo_id',$id_equipo)->get();
        //dd($consulta_placa);
        foreach($consulta_placa as $placa){
            $placa->disponible = "si";
            $placa->equipo_id = NULL;
            $placa->save();
        }
    }

    public function eliminarProcesador($id_equipo){
        $consulta_procesador = Procesador::where('equipo_id',$id_equipo)->get();
        foreach($consulta_procesador as $procesador){
            $procesador->disponible = "si";
            $procesador->equipo_id = NULL;
            $procesador->save();
        }
    }

    public function eliminarMemoria($id_equipo){
        $consulta_memoria = MemoriaRam::where('equipo_id',$id_equipo)->get();
        foreach($consulta_memoria as $memoria){
            $memoria->disponible = "si";
            $memoria->equipo_id = NULL;
            $memoria->save();
        }
    }

    public function eliminarDisco($id_equipo){
        $consulta_disco = DiscoDuro::where('equipo_id',$id_equipo)->get();
        foreach($consulta_disco as $disco){
            $disco->disponible = "si";
            $disco->equipo_id = NULL;
            $disco->save();
        }
    }

    public function eliminarImpresora($id_equipo){
        $consulta_impresora = Impresora::where('equipo_id',$id_equipo)->get();
        foreach($consulta_impresora as $impresora){
            $impresora->disponible = "si";
            $impresora->equipo_id = NULL;
            $impresora->save();
        }
    }

    public function eliminarIp($id_equipo){
        $consulta_ip = Ip::where('equipo_id',$id_equipo)->get();
        foreach($consulta_ip as $ip){
            $ip->disponible = "si";
            $ip->equipo_id = NULL;
            $ip->save();
        }
    }

    public function eliminarFuente($id_equipo){
        $consulta_fuente = Fuente::where('equipo_id',$id_equipo)->get();
        foreach($consulta_fuente as $fuente){
            $fuente->disponible = "si";
            $fuente->equipo_id = NULL;
            $fuente->save();
        }
    }

}
