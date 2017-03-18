
<label class="col-sm-2 control-label">Memoria (slot-2)</label>
<div class="col-xs-8">
	<select name="id_memoria2" class="form-control" required>
		<option value="null">Seleccione memoria...</option>
		@foreach($memorias_disponibles as $memoria)
			@if($memoria->disponible == "si")
				<option value="{{$memoria->id}}">{{ $memoria->tipo_memoria.' - '.$memoria->marca_memoria.' - '.$memoria->capacidad_memoria.' - '.$memoria->frecuencia}}</option>
			@endif
		@endforeach
	</select>
</div>