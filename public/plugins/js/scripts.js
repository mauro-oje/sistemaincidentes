function editar_modal(id,accion){
	$.get(id+'/'+accion+'_modal',function(html){
		$('#editar_modal').html(html);
		$('#editar_modal_id').modal('show');
	});
}

function registrar_modal(){
	$.get('registrar_modal',function(html){
		$('#editar_modal').html(html);
		$('#editar_modal_id').modal('show');
	});
}