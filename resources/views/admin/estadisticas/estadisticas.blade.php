@extends('admin.plantilla.principal')
@section('titulo','Incidente')
@section('contenido')

	<div id="incidente_por_tipo" style="height: 350px;"></div>

	<div id="incidente_por_estado" style="height: 350px;"></div>

	<div id="incidente_por_area" style="height: 400px;"></div>

	<script src="{{ asset('plugins/bootstrap/js/echarts.js') }}"></script>
	<script type="text/javascript">
		require.config({
			paths:{
				echarts: '/Laravel/SistemaIncidentes/public/plugins/bootstrap/js'
			}
		});

		require(
			[
			'echarts',
			'echarts/chart/pie',
			'echarts/chart/line',
			'echarts/chart/bar'
			],
			function(ec){
				//Torta tipo incidentes
				var incidentePorTipo = ec.init(document.getElementById('incidente_por_tipo'));
				var	incidentePorTipoOption = {
					    title : {
					        text: 'Incidente',
					        subtext: 'Por tipo',
					        x:'center'
					    },
					    tooltip : {
					        trigger: 'item',
					        formatter: "{a} <br/>{b} : {c} ({d}%)"
					    },
					    legend: {
					        orient : 'vertical',
					        x : 'left',
					        data:[]
					    },
					    toolbox: {
					        show : true,
					        feature : {
					            dataView : {show: true, readOnly: false, title: 'Información', lang: ['Información', 'Cancelar', 'Actualizar']},
					            magicType : {
					                show: true, 
					                type: [],
					                option: {
					                    funnel: {
					                        x: '25%',
					                        width: '50%',
					                        funnelAlign: 'left',
					                        max: 1548
					                    }
					                }
					            },
					            restore : {
							        show : true,
							        title : 'Actualizar'
							    },
					            saveAsImage : {show: true, title : 'Guardar'}
					        }
					    },
					    calculable : true,
					    series : [
					        {
					            name:'incidente',
					            type:'pie',
					            radius : '55%',
					            center: ['50%', '60%'],
					            data:[]
					        }
					    ]
			};

			$.get('estadisticas-por-tipo-incidente',function(data){
				var x = JSON.parse(data);
				//alert(x[1]['cantidad']);

				$.each(x,function(k,v){
					var nombre;
					if (v['tipo_incidente'] === 'admin') {
						nombre = 'Administrador';
					} else if (v['tipo_incidente'] === 'tecnicoHS') {
						nombre = 'Hardware/Software';
					} else {
						nombre = 'Red/Internet';
					}
					incidentePorTipoOption.legend.data.push(
						nombre
					);
					incidentePorTipoOption.series[0].data.push(
						{value:v['cantidad'], name:nombre}
					);
				});

				incidentePorTipo.setOption(incidentePorTipoOption);
				incidentePorTipo.setTheme('infographic');
			});


			//Torta tipo estado
				var incidentePorEstado = ec.init(document.getElementById('incidente_por_estado'));
				var	optionPorEstado = {
					    title : {
					        text: 'Incidente',
					        subtext: 'Por estado',
					        x:'center'
					    },
					    tooltip : {
					        trigger: 'item',
					        formatter: "{a} <br/>{b} : {c} ({d}%)"
					    },
					    legend: {
					        orient : 'vertical',
					        x : 'left',
					        data:[]
					    },
					    toolbox: {
					        show : true,
					        feature : {
					            dataView : {show: true, readOnly: false, title: 'Información', lang: ['Información', 'Cancelar', 'Actualizar']},
					            magicType : {
					                show: true, 
					                type: [],
					                option: {
					                    funnel: {
					                        x: '25%',
					                        width: '50%',
					                        funnelAlign: 'left',
					                        max: 1548
					                    }
					                }
					            },
					            restore : {
							        show : true,
							        title : 'Actualizar'
							    },
					            saveAsImage : {show: true, title : 'Guardar'}
					        }
					    },
					    calculable : true,
					    series : [
					        {
					            name:'incidente',
					            type:'pie',
					            radius : '55%',
					            center: ['50%', '60%'],
					            data:[]
					        }
					    ]
			};

			$.get('estadisticas-por-estado',function(data){
				var x = JSON.parse(data);
				//alert(x[1]['cantidad']);

				$.each(x,function(k,v){
					var nombre;
					v['estado']
					if (v['estado'] === 'abierto') {
						nombre = 'Abierto';
					} else {
						nombre = 'Cerrado';
					}
					optionPorEstado.legend.data.push(
						nombre
					);
					optionPorEstado.series[0].data.push(
						{value:v['cantidad'], name:nombre}
					);
				});

				incidentePorEstado.setOption(optionPorEstado);
			});

			//Torta por Area
				var incidentePorArea = ec.init(document.getElementById('incidente_por_area'));
				option = {
				    title : {
				        text: 'Incidente ',
				        subtext: 'Por tipo de Área'
				    },
				    tooltip : {
				        trigger: 'axis'
				    },
				    grid:{y:80},
				    legend: {
				        data:['Hardware/Software','Red/Internet','Consultas Generales']
				    },
				    toolbox: {
				        show : true,
				        feature : {
				        	dataView : {show: true, readOnly: false, title: 'Información', lang: ['Información', 'Cancelar', 'Actualizar']},
				            magicType : {show: true, title:{line:'Lineal',bar:'Barra',stack:'Apilado',tiled:'Separado'}, type: ['line', 'bar', 'stack', 'tiled']},
				            restore : {show: true, title : 'Actualizar'},
				            saveAsImage : {show: true,title : 'Guardar'}
				        }
				    },
				    calculable : true,
				    xAxis : [
				        {
				        	name: 'Áreas',
				            type : 'category',
				            data : [],
				            axisLabel : {rotate:20}
				        }
				    ],
				    yAxis : [
				        {
				        	name:'Cantidad',
				            type : 'value'
				        }
				    ],
				    series : []
				};

			$.get('estadisticas-por-area',function(data){
				var x = JSON.parse(data);
				option.xAxis[0].data = x[0];
				$.each(x[2],function(k,v){
					var nombre_tecnico;
					if(v == "admin"){
						nombre_tecnico = "Consultas Generales";
					}else if(v == "tecnicoHS"){
						nombre_tecnico = "Hardware/Software";
					}else{
						nombre_tecnico = "Red/Internet";
					}
					option.series.push({name: nombre_tecnico, 
									type:'bar', 
									stack:'total',
									data:x[1][k]}
									);
				});
				incidentePorArea.setOption(option);
				incidentePorArea.setTheme('macarons');

			});

		});

	</script>
@endsection


