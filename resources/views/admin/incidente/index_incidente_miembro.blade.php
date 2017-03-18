@extends('admin.plantilla.principal')
@section('titulo','Listado de incidentes')
@section('contenido')

    <h2 class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i> Listado de incidentes</h2>

    @if(Auth::user()->tipo == "miembro")
        <div class="form-group">
            <a href="{{route('incidente.crear')}}" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Registrar incidente</a>
        </div>
    @endif
    <hr>
    <!--Incluyo el paquete Flash para mostrar los mensajes de errores-->
    @include('flash::message')
    <div id="contenedor_tabla">
        <table class="table table-bordered" id="tabla_miembro">
        <thead>
          <tr>
            <th>N° de Inc.</th>
            <th>Tipo Incidente</th>
            <th>Prioridad</th>
            <th>Estado</th>
            <th>Ver más</th>
            <th>Acciones</th>
          </tr>
        </thead>

        </table>
    </div>
<script>
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td>Descripción:</td>'+
                        '<td>'+d.descripcion_incidente+'</td>'+
                    '</tr>'+
                '</table>';
    }

    $(document).ready(function() {
        var table = $('#tabla_miembro').DataTable( {
            "destroy":true,
            //"processing":true,
            //"serverSide": true,
            "ajax": {
                "url":"http://localhost/Laravel/SistemaIncidentes/public/incidente/tabla-miembro-ajax",
                "type": "GET",
                //"method": "GET",
                "dataType":"JSON"
            },
            //"ajax": "http://localhost/Laravel/SistemaIncidentes/public/incidente/lista-de-incidentes",
            "columns": [
                { "data": "id" },
                { "data": "tipo_incidente" },
                { "data": "prioridad" },
                { "data": "estado" },
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "defaultContent":"<button type='button' class='incidente_id btn btn-primary'>Ver incidente</button>"}
            ],
            "createdRow" : function(row,data,index){
                if(data['tipo_incidente'] == 'tecnicoHS'){
                    $('td:eq(1)',row).html('Hardware - Software');
                }else if(data['tipo_incidente'] == 'tecnicoRI'){
                    $('td:eq(1)',row).html('Red - Internet');
                }else if(data['tipo_incidente'] == 'admin'){
                    $('td:eq(1)',row).html('Sistema - Consulta');
                }else{
                    $('td:eq(1)',row).html('');
                }
                if(data['estado'] == 'abierto'){
                    $('td:eq(3)',row).html('<span class="form-control-static label label-success">Abierto</span>');
                }else if(data['estado'] == 'cerrado'){
                    $('td:eq(3)',row).html('<span class="form-control-static label label-danger">Cerrado</span>');
                }else{
                    $('td:eq(3)',row).html('-');
                }
                if(data['id'] == 0){
                    $('#contenedor_tabla').html('<h3>No hay incidentes registrados</h3>');
                }
            },
            "order": [[0, 'desc']],
            "language":{
                "url":"{{ asset('plugins/bootstrap/spanish.json') }}"
            }
        } );
        
        obtener_incidente_id("#tabla_miembro tbody",table)

        // Add event listener for opening and closing details
        $('#tabla_miembro tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );

    var obtener_incidente_id = function(tbody, table){
        $(tbody).on("click","button.incidente_id",function(){
            var data = table.row($(this).parents("tr")).data();
            var id = data.id;
            //console.log(id);
            var route = "http://localhost/Laravel/SistemaIncidentes/public/incidente/"+id+"/cometarios";
            //$.get(route);
            window.location.href = route;
        });
    }

</script>

@endsection