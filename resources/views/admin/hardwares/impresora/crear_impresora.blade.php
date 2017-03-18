@extends('admin.plantilla.principal')
@section('titulo', 'Registrar Impresora')
@section('contenido')
	<!--Acá va el Include de los errores que esta en la
		plantilla Principal (include(admin.plantilla.errors))-->

	<!--Usamos el paquete de formulario para crear el formlario
	de ceracion de Oficina -->
	
	<div class="panel panel-primary">

		<div class="panel-heading">
			<h3 class="centro panel-title"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Impresora</h3>
		</div>

		<div class="panel-body">

			{!! Form::open(['route'=>'admin.impresora_crud.store', 'method'=>'POST','class'=>'form-horizontal']) !!}

				<div class="form-group @if($errors->has('marca_impresora')) has-error @endif">
					{!! form::label('marca_impresora','Marca:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('marca_impresora',['Epson'=>'Epson','Samsung'=>'Samsung','HP'=>'HP','Kyocera'=>'Kyocera',
															'Kanon'=>'Kanon','Lexmark'    =>'Lexmark'],
													    	null, 
													    	['class'=>'form-control','placeholder'=>'Seleccione marca...']) 
						!!}
						@if($errors->has('marca_impresora'))
							<p class="help-block">{{$errors->first('marca_impresora')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('modelo_impresora')) has-error @endif">
					{!! form::label('modelo_impresora','Modelo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-9">
						{!! form::text('modelo_impresora',null,['class'=>'form-control','placeholder'=>'Ingrese modelo...']) !!}
						@if($errors->has('modelo_impresora'))
							<p class="help-block">{{$errors->first('modelo_impresora')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('tipo_impresora')) has-error @endif">
					{!! form::label('tipo_impresora','Tipo:',['class'=>'col-xs-2 control-label']) !!}
					<div class="col-xs-8">
						{!! form::select('tipo_impresora',['Toner'=>'Toner','Toner a color'=>'Toner a color','Tinta'=>'Tinta',
														'Tinta a color'=>'Tinta a color','Inyección a tinta'=>'Inyección a tinta'],
														null, 
														['class'=>'form-control','placeholder'=>'Seleccione capacidad...']) 
						!!}
						@if($errors->has('tipo_impresora'))
							<p class="help-block">{{$errors->first('tipo_impresora')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="form-group @if($errors->has('id_ip')) has-error @endif">
					<label class="col-sm-2 control-label">IP</label>
					<div class="col-xs-8">
						<select name="id_ip" class="form-control">
							<option value="null">Seleccione IP...</option>
							@foreach($ips as $ip)
								@if($ip->disponible == "si")
									<option value="{{$ip->id}}">{{ $ip->direccion }}</option>
								@endif
							@endforeach
						</select>
						@if($errors->has('id_ip'))
							<p class="help-block">{{$errors->first('id_ip')}}</p> 
						@endif
					</div>
				</div>
				<br>
				<div class="col-xs-offset-2 col-xs-8">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Resgistrar</button>
					<a href="{{route('impresora.index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span>  Cancelar</a>
				</div>
			{!! Form::close() !!}

		</div>
	</div>

@endsection