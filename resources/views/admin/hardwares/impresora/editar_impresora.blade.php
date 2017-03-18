@extends('admin.plantilla.principal')
@section('titulo', 'Editar Impresora')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->	
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-edit"></span> Editar Impresora</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route'=>['admin.impresora_crud.update',$impresora,$ips], 'method'=>'PUT','class'=>'form-horizontal']) !!}
				<div class="form-group">
					{!! form::label('marca_impresora','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('marca_impresora',['Epson'=>'Epson','Samsung'=>'Samsung','HP'=>'HP','Kyocera'=>'Kyocera',
														'Kanon'=>'Kanon','Lexmark'=>'Lexmark'],
													    $impresora->marca_impresora, 
													    ['class'=>'form-control',
													    'required']) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('modelo_impresora','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-9">
						{!! form::text('modelo_impresora',$impresora->modelo_impresora,['class'=>'form-control']) !!}
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('tipo_impresora','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-md-8">
						{!! form::select('tipo_impresora',['Toner'=>'Toner','Toner a color'=>'Toner a color','Tinta'=>'Tinta',
												'Tinta a color'=>'Tinta a color','Inyección a tinta'=>'Inyección a tinta'],
												$impresora->tipo_impresora, 
												['class'=>'form-control',]) 
						!!}
					</div>
				</div>
				<br>
				<div class="form-group">
					<label class="col-sm-2 control-label">Ip</label>
					<div class="col-xs-8">
						<select name="id_ip" class="form-control">
							@if($consulta_ip)
								<option value="{{$consulta_ip->id}}">{{$consulta_ip->direccion}}</option>
								<option value="null">-- SIN dirección IP --</option>
							@else
								<option value="null">Seleccione ip...</option>
								<option value="null">-- SIN dirección IP --</option>
							@endif
							@foreach($ips as $ip)
									<option value="{{$ip->id}}">{{ $ip->direccion }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<div class="form-group">
					{!! form::label('disponible','Disponible:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('disponible',['si'=>'Disponible','no'=>'No disponible'], 
													  $impresora->disponible, 
													  ['class'=>'form-control'])
						!!}
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</button>
					<a href="{{route('impresora.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection