<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\IncidenteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\PHPMailer;
use Barryvdh\DomPDF\Facade as PDF;
use App\Incidente;
use App\User;
use Auth;

class IncidenteController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        //$tipo = Auth::user()->tipo;
        if($usuario->is('admin')){
            $incidentes = Incidente::orderBy('id','DES')->paginate(10);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('admin/incidente/crear_incidente');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidenteRequest $request){
        //dd($request->all());
        $usuario                          = User::find(Auth::user()->id);
        $incidente                        =  new Incidente();
        $incidente->tipo_incidente        =  $request->tipo_incidente;
        $incidente->descripcion_incidente = $request->descripcion_incidente;
        $incidente->prioridad             = $request->prioridad;
        $incidente->user_id               = $usuario->id;
        $incidente->save();

        $usuarios = db::table('users')
            ->where('tipo','=',$incidente->tipo_incidente)
            ->get();

        
        require '../phpmailer/lib/class.phpmailer.php';

        $mail = new \PHPMailer(true);
            $mail->IsSMTP();
            $mail->Mailer = 'smtp';
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            // or try these settings (worked on XAMPP and WAMP):
            // $mail->Port = 587;
            // $mail->SMTPSecure = 'tls';
            $mail->Username = "sgincidentes@gmail.com";
            $mail->Password = "SGincidentes21";
            $mail->IsHTML(true); // if you are going to send HTML formatted emails
            $mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
            $mail->From = "sgincidentes@gmail.com";
            $mail->FromName = "Sistema Gestion de Incidentes";
            foreach($usuarios as $user){
                    $mail->addAddress($user->email,$user->name); //"cromero2386@gmail.com","User 1"
                    //$mail->addAddress("mauro88_z@hotmail.com","User 2");
            }
            $mail->addCC("sgincidentes@gmail.com","Sistema Gestion de Incidentes");
            //$mail->addBCC("user.4@in.com","User 4");
            $mail->Subject = "Gestion de incidentes - El usuario ".$usuario->name." ".$usuario->apellido." ha registrado un nuevo incidente";
            $mail->Body = "Prioridad: ".$incidente->prioridad."<br/> "."Descripción:".$incidente->descripcion_incidente;
            //dd($mail);
            
            if(!$mail->Send())
                echo "El mensaje no fue enviado <br />PHPMailer Error: " . $mail->ErrorInfo; // "Message was not sent <br />PHPMailer Error: "
            else
                echo "El mensaje ha sido enviado con exítos!"; // "Message has been sent"
            
            flash('Incidente registrado correctamente!','success');
        
        if(Auth::user()->tipo == "miembro"){
            return redirect()->route('incidente.listado.miembros');
        }else{
            return redirect()->route('incidente.listado.tecnico');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listadoIncidentesTecnicos(){  
        //$tipo = Auth::user()->tipo;
        return view('admin/incidente/listado_incidentes_tecnicos'); 
    }

    public function listadoIncidentesTecnicosPropio(){
        return view('admin/incidente/listado_incidentes_tecnicos_propio');
    }

    public function listadoIncidensteMiembros(Request $request){

        $tipo = Auth::user()->tipo;
        if($tipo == "miembro"){
            $incidente_consulta = Incidente::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
            return view('admin/incidente/index_incidente_miembro',compact('incidente_consulta'));
        }
    }

    public function listadoMiembroAjax(){

        // SELECT u.id, u.name, u.apellido, i.tipo_incidente, i.prioridad, i.estado, i.descripcion_incidente 
        // FROM incidentes_usuarios AS iu 
        // INNER JOIN users AS u ON iu.user_id = u.id 
        // INNER JOIN incidentes AS i ON iu.incidente_id = i.id 
        // WHERE i.tipo_incidente = 'tecnicoRI'

        //if($tipo == "admin"){
        if(Auth::user()->tipo == "miembro"){
            $incidentes_consulta = db::table('incidentes as i')
                ->join('users as u', 'u.id', '=', 'i.user_id')
                ->select('u.name','u.apellido','i.id','i.tipo_incidente','i.prioridad','i.estado','i.descripcion_incidente')
                ->where('i.user_id',Auth::user()->id)
                ->get();
            
            if($incidentes_consulta){
                foreach($incidentes_consulta as $key => $value){
                    $resources['data'][] = $value;
                }
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }else{
                $resources['data'][] = array("name"=>"","apellido"=>"","id"=>"0","tipo_incidente"=>"-","prioridad"=>"","estado"=>"","descripcion_incidente"=>"");
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }
            
        }
    }

    public function listadoTecnicoAjax(){

        $tipo = Auth::user()->tipo;

        // SELECT u.id, u.name, u.apellido, i.tipo_incidente, i.prioridad, i.estado, i.descripcion_incidente 
        // FROM incidentes_usuarios AS iu 
        // INNER JOIN users AS u ON iu.user_id = u.id 
        // INNER JOIN incidentes AS i ON iu.incidente_id = i.id 
        // WHERE i.tipo_incidente = 'tecnicoRI'

        $incidentes_consulta = db::table('incidentes as i')
            ->join('users as u', 'u.id', '=', 'i.user_id')
            ->select('u.name','u.apellido','i.id','i.tipo_incidente','i.prioridad','i.estado','i.descripcion_incidente')
            ->where('i.tipo_incidente',$tipo)
            ->get();

        /* Con esto andaba bien.
        foreach($incidentes_consulta as $key => $value){
            $resources['data'][] = $value;
        }

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
        */
        if($incidentes_consulta){
                foreach($incidentes_consulta as $key => $value){
                    $resources['data'][] = $value;
                }
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }else{
                $resources['data'][] = array("name"=>"","apellido"=>"","id"=>"0","tipo_incidente"=>"-","prioridad"=>"","estado"=>"","descripcion_incidente"=>"");
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }
    }

    public function listadoTecnicoPropioAjax(){

        $id = Auth::user()->id;

        $incidentes_consulta = db::table('incidentes as i')
            ->join('users as u', 'u.id', '=', 'i.user_id')
            ->select('u.name','u.apellido','i.id','i.tipo_incidente','i.prioridad','i.estado','i.descripcion_incidente')
            //->where('i.tipo_incidente',$tipo)
            ->where('i.user_id',$id)
            ->get();

        if($incidentes_consulta){
                foreach($incidentes_consulta as $key => $value){
                    $resources['data'][] = $value;
                }
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }else{
                $resources['data'][] = array("name"=>"","apellido"=>"","id"=>"0","tipo_incidente"=>"-","prioridad"=>"","estado"=>"","descripcion_incidente"=>"");
                $resources_JASON_array = json_encode($resources);
                return $resources_JASON_array;
            }
    }

    public function pdfIncidentes(){

        $tipo = Auth::user()->tipo;

        $incidentes_consulta = db::table('incidentes as i')
            ->join('users as u', 'u.id', '=', 'i.user_id')
            ->select('u.name','u.apellido','i.id','i.tipo_incidente','i.prioridad','i.estado','i.descripcion_incidente','i.created_at')
            ->where('i.tipo_incidente',$tipo)
            ->get();

        $pdf = PDF::loadView('admin/PDF/pdf_incidentes',['incidentes_consulta' => $incidentes_consulta]);
        return $pdf->download('incidente.pdf');
    }

    public function pdfUsuario(){

        $usuarios = User::all();

        $pdf = PDF::loadView('admin/PDF/pdf_usuarios',['usuarios' => $usuarios]);

        return $pdf->download('listado_usuarios.pdf');
    }

    public function pdfIncidentesDetalle($detalle_id){

        $incidente_consulta = Incidente::where('id',$detalle_id)->get();

        $incidente_consulta_detalle = db::table('incidentes as i')
            ->join('comentarios as c', 'i.id', '=', 'c.incidente_id')
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->select('u.name','u.apellido','u.tipo','i.tipo_incidente','i.created_at','c.comentario','c.created_at')
            ->where('i.id',$detalle_id)
            ->get();

        $pdf = PDF::loadView('admin/PDF/pdf_incidente_detalle',['incidente_consulta' => $incidente_consulta,
                                                                'incidente_consulta_detalle' => $incidente_consulta_detalle
                                                                ]);
        $pdf->setPaper('A4','portrait');

        return $pdf->download('incidente_detalle.pdf');

    }

    public function estadisticasVista(){

        return view('admin/estadisticas/estadisticas');

    }

    public function estadisticas(){

        $incidentes_consulta = DB::table('incidentes')
            ->select('tipo_incidente',DB::raw('COUNT(*) as cantidad'))
            ->groupBy('tipo_incidente')
            ->get();

        foreach($incidentes_consulta as $key => $value){
            $resources[] = $value;
        }

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
    }

    public function estadisticaPorEstado(){

        $incidentes_consulta = DB::table('incidentes')
            ->select('estado',DB::raw('COUNT(*) as cantidad'))
            ->groupBy('estado')
            ->get();

        foreach($incidentes_consulta as $key => $value){
            $resources[] = $value;
        }

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
    }

    public function estadisticaPorArea(){

        //SELECT d.nombre_area, count(d.nombre_area) FROM `incidentes` as a 
        //join users as b on a.user_id = b.id                               
        //join oficinas as c on b.oficina_id = c.id                         
        //join areas as d on c.area_id = d.id                               
        //GROUP BY d.nombre_area

        //SELECT d.nombre_area, COUNT(a.id) 
        //FROM `incidentes` as a 
        //join users as b on a.user_id = b.id 
        //join oficinas as c on b.oficina_id = c.id 
        //RIGHT JOIN areas as d on c.area_id = d.id 
        //GROUP BY d.nombre_area

        $tipo_usuario = DB::table('users')
            ->select('tipo')
            ->where('tipo','<>','miembro')
            ->distinct() 
            ->get();

        $consulta_arreglo = array();

        foreach($tipo_usuario as $tipo){
            $incidentes_consulta = DB::select("select COUNT(a.id) as cantidad FROM incidentes as a 
                                            join users as b on a.user_id = b.id 
                                            AND a.tipo_incidente = '$tipo->tipo'
                                            join oficinas as c on b.oficina_id = c.id
                                            right join areas as d on c.area_id = d.id
                                            GROUP BY d.nombre_area");
            $consulta_arreglo[] = $incidentes_consulta;
        }

        $arreglo_final = array();
        foreach($consulta_arreglo as $arreglo){
            $arreglo_cantidades = array();
            foreach($arreglo as $cantidad){
                $arreglo_cantidades[] = $cantidad->cantidad;
            }
            $arreglo_final[] = $arreglo_cantidades;
        }

        $incidentes_consulta_areas = DB::table('areas')
            ->select('nombre_area')
            ->get();

        foreach($incidentes_consulta_areas as $key => $value){
            $nombre = $value->nombre_area;
            if($nombre == "Mesa de entrada"){
                $nombre = "M. entrada";
            }
            if($nombre == "Tierras fiscales"){
                $nombre = "T Fiscales";
            }
            if($nombre == "Privada"){
                $nombre = "Priv.";
            }
            if($nombre == "Ingenieria"){
                $nombre = "Ing.";
            }

            $nombres_areas[] = $nombre;
        }

        $resources[0] = $nombres_areas;
        $resources[1] = $arreglo_final;

        $array_tipo = array();
        foreach($tipo_usuario as $tipo){
            $array_tipo[] = $tipo->tipo;
        }
         $resources[2] = $array_tipo;

        $resources_JASON_array = json_encode($resources);
        return $resources_JASON_array;
    }

}

