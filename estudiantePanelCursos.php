<!DOCTYPE html> 
<html>
	<head>
		<meta charset="ISO-8859-15">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ISCloud</title> 

		<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js"></script>
				
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
		
		<style type="text/css">
			body {
				padding-top: 60px; padding-bottom: 40px;
			}
			.sidebar-nav {
				padding: 9px 0;
			} 
			@media (max-width: 980px) {
				/* Enable use of floated navbar text */
				.navbar-text.pull-right {
					float: none; padding-left: 5px; padding-right: 5px;
				}
			}
		</style>
	</head> 
	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button> <a class="brand" href="#">ISCloud Estudiante</a>
					<div class="nav-collapse collapse">
						<p class="navbar-text pull-right">
							Autenticado en el sistema como <b> <a href="#" class="navbar-link">mb.juan10</a> </b>
						</p>
						<ul class="nav">
							<li class="active">
								<a href="#">Cursos</a>
							</li>
							<li>
								<a href="#about">Proyectos</a>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">
								MISIS
							</li> 
							<li class="active">
								<a href="#">ISIS 3510-2 Construcción aplicaciones móviles </a>
							</li>
							<li>
								<a href="#">ISIS 3502-1 Sistemas Manejadores de Bases de Datos</a>
							</li>
						</ul>
					</div><!--/.well -->
				</div><!--/span--> 
				<div class="span9">
					<div id="main" class="container">
						<table class="table table-striped">
							<tr>
								<th style="width: 1px;"></th> 
								<th><b>Laboratorios virtuales</b></th>
								<th><b>Operaciones</b></th>
								<th><b>Guardar estado</b></th>
								<th><b>Estados anteriores</b></th>
							</tr> 
							<!-- ko foreach: tasks -->
								<tr>
									<td>
										<span data-bind="visible: activo()" class="label label-success">Activo</span>
										<span data-bind="visible: inactivo()" class="label label-important">Inactivo</span>
										<span data-bind="visible: pausado();" class="label">Pausado</span>
										<span class="label label-warning">Plazo: <span data-bind="text: plazo">	</span> dÃ­as</span>
									</td>
									<td>
										<p>
											<b data-bind="text: titulo"></b>
											<br /><b data-bind="text: descripcion"></b>
										</p>
										<b>Usuario: </b><b data-bind="text: usuario"></b>
										<br />
										<b>Password: </b><b data-bind="text: password"></b>
										<br />
										<a href=""><span data-bind="text: accesoDirecto">Descargar acceso directo</span></a>
									</td>
									<td>
										<span data-bind="visible: !activo()">
											<button data-bind="click: $parent.marcarActivo" class="btn">
												<i class="icon-play"></i> Iniciar
											</button> 
										</span>
										<span data-bind="visible: !pausado() && activo()">
											<button data-bind="click: $parent.marcarPausado" class="btn">
												<i class="icon-pause"></i> Pausar
											</button> 
										</span>
										<span data-bind="visible: !inactivo()">
											<button data-bind="click: $parent.marcarInactivo" class="btn">
												<i class="icon-stop"></i> Terminar
											</button> 
										</span>
										<br /> 
										<button data-bind="click: $parent.reportarProblema" class="btn btn-danger" style="margin-top:10px;">
											<i class="icon-envelope icon-white"></i> Reportar problema
										</button>
									</td>
									<td> <button data-bind="click: $parent.guardarEstado" class="btn">
										<i class="icon-camera"></i> Guardar estado</button>
										<br />
									</td>
									<td>
										<select name="comboBoxRestaurarEstado">

												<?php
													require_once __DIR__ . '/php-activerecord/ActiveRecord.php';

													// initialize ActiveRecord
													// change the connection settings to whatever is appropriate for your mysql server 
													ActiveRecord\Config::initialize(function($cfg)
													{
														$cfg->set_model_directory('models');
														$cfg->set_connections(array('development' => 'mysql://iscloud1320:HGXi4xBdkA6t75v2IWvz@127.0.0.1/iscloud1320'));
													});

													$estadoLab = EstadoLaboratorio::first();

													$estadoLab = EstadoLaboratorio::find('all');
													foreach ($estadoLab as $estado) 
													{
														echo '<option value="'.$estado->id.'" >'.$estado->timestamp." ".$estado->descripcion."</option>";
													}
												?>

										</select>
										<br />
										<button data-bind="click: $parent.restaurarEstado" class="btn">
											<i class="icon-fast-backward"></i> Restaurar estado
										</button>
									</td>
								</tr> 
							<!-- /ko -->
						</table>
					</div>

					<div id="login" class="modal hide fade" tabindex="=1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
						<div class="modal-header">
							<h3 id="loginLabel">Sign In</h3>
						</div>
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="inputUsername">Username</label>
									<div class="controls">
										<input data-bind="value: username" type="text" id="inputUsername" placeholder="Username">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
										<input data-bind="value: password" type="password" id="inputPassword" placeholder="Password">
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button data-bind="click: login" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Sign In</button>
						</div>
					</div>

				</div><!--/span-->
			</div><!--/row-->
		</div>

		<div id="reportarFuncionamientoIncorrecto" class="modal hide fade" tabindex="=1" role="dialog" aria-labelledby="reportarFuncionamientoIncorrectoDialogLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3>Reportar problema</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="selectTipoDeProblema">Tipo de problema</label>
						<div class="controls">
							<select class="span3" id="selectTipoDeProblema">
								<option>Recursos computacionales asignados erróneos</option>
								<option>Programa no funcionando</option>
								<option>Máquina lenta</option>
								<option>Error de sistema operativo</option>
								<option>Error de credenciales</option>
								<option>Error de conexión</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="textareaDescripcion">Descripción</label>
						<div class="controls">
							<textarea rows="3" data-bind="value: descripcion" type="text" id="textareaDescripcion" placeholder="Descripcion" style="width: 250px;">
							</textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-bind="click: reportarFuncionamientoIncorrecto" class="btn btn-primary" type="button"><i class="icon-envelope icon-white"></i> Enviar</button>

				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			</div>
		</div>


		<div id="guardarEstado" class="modal hide fade" tabindex="=1" role="dialog" aria-labelledby="guardarEstadoDialogLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3>Guardar estado de ejecución</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="textareaDescripcion">Descripción</label>
						<div class="controls">
							<textarea rows="3" data-bind="value: descripcion" type="text" id="textareaDescripcion" placeholder="Descripción opcional" style="width: 250px;">
							</textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-bind="click: guardarEstado( $parent )" class="btn btn-primary" type="button"><i class="icon-camera icon-white"></i> Guardar estado</button>

				<button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
			</div>
		</div>

		<footer>
			<p>
				&copy; <a href="">Departamento de Ingeniería de Sistemas y Computación</a> - <a href="">Universidad de Los Andes</a>
			</p>
		</footer>

		<script type="text/javascript">
		
			function tasksViewModel()
			{
				var self = this; 
				self.tasks = ko.observableArray();

				self.tasks([
				{
					plazo : ko.observable(1),
					titulo : ko.observable('titulo #1'),
					descripcion : ko.observable('descripcion #1'),
					usuario : ko.observable('usuario #1'),
					password : ko.observable('password #1'),
					accesoDirecto : ko.observable('accesoDirecto #1'),
					activo : ko.observable(true), 
					inactivo : ko.observable(false), 
					pausado : ko.observable(false),
					estadosLaboratorio: ko.observable( { id: '2', laboratoriosVirtuales_id : 1, descripcion: 'descripcion', timestamp: 'timestamp' } )
				}, 
				{
					plazo : ko.observable(2),
					titulo : ko.observable('titulo #2'),
					descripcion : ko.observable('descripcion #2'), 
					usuario : ko.observable('usuario #2'), 
					password : ko.observable('password #2'), 
					accesoDirecto : ko.observable('accesoDirecto #2'),
					activo : ko.observable(false), 
					inactivo : ko.observable(true), 
					pausado : ko.observable(false),
					estadosLaboratorio: ko.observable( { id: '2', laboratoriosVirtuales_id : 1, descripcion: 'descripcion', timestamp: 'timestamp' } )
				}, 
				{
					plazo : ko.observable(3),
					titulo : ko.observable('titulo #3'),
					descripcion : ko.observable('descripcion #3'), 
					usuario : ko.observable('usuario #3'), 
					password : ko.observable('password #3'), 
					accesoDirecto : ko.observable('accesoDirecto #3'),
					activo : ko.observable(false), 
					inactivo : ko.observable(false), 
					pausado : ko.observable(true),
					estadosLaboratorio: ko.observable({ id: '2', laboratoriosVirtuales_id : 1, descripcion: 'descripcion', timestamp: 'timestamp' } )
				}]);
			
				self.username = "";
				self.password = "";

				self.marcarActivo = function( task )
				{
					task.activo( true );
					task.pausado( false );
					task.inactivo( false );

					self.ajax( task.uri(), 'PUT', { 
						activo: true, 
						pausado: false, 
						inactivo: false 
					}).done( function( res ) {
						self.updateTask( task, res.task );
					});
				};
				
				self.marcarPausado = function( task ) 
				{
					task.activo( false );
					task.pausado( true );
					task.inactivo( false );

					self.ajax(task.uri(), 'PUT', { 
						activo: false, 
						pausado: true, 
						inactivo: false 
					}).done( function( res ) {
						self.updateTask( task, res.task );
					});
				};
				
				self.marcarInactivo = function( task ) {
					task.activo( false );
					task.pausado( false );
					task.inactivo( true );

					self.ajax( task.uri(), 'PUT', { 
						activo: false, 
						pausado: false, 
						inactivo: true 
					}).done( function( res ) {
						self.updateTask( task, res.task );
					});
				};
				
				self.reportarProblema = function( ) {
					$('#reportarFuncionamientoIncorrecto').modal('show');
				};
				
				self.guardarEstado = function() {
					$('#guardarEstado').modal('show');
				};

				self.restaurarEstado = function( ) {
					alert("Restaurar estado");
				};
				
				self.beginLogin = function() 
				{
					$('#login').modal('show');
				};
				
				self.crearEstadoLaboratorio = function( estadoLaboratorio ) 
				{
					//estadoLaboratorio.laboratoriosVirtuales_id: task.plazo;
					self.ajax( "/backendUI.php", 'GET', estadoLaboratorio );
					<?php
						/*$estadoLab = EstadoLaboratorio::find('all');
						foreach ($estadoLab as $estado) 
						{
							echo "\r\n";
							//echo ( print_r($estado) );
							//echo "LabID:".$estado->laboratoriosvirtuales_id;
							echo "self.estadosLaboratorio.push({id: ".$estado->id.", laboratoriosVirtuales_id: ".$estado->laboratoriosvirtuales_id.', descripcion: "'.$estado->descripcion.'", timestamp: "'.$estado->timestamp.'"});';
						}*/
					?>
						/*self.estadosLaboratorio.push({
							id: '2', 
							laboratoriosVirtuales_id : 1,
							descripcion: 'descripcion', 
							timestamp: 'timestamp.'
						});*/
					
				};
				
				self.ajax = function(uri, method, data) 
				{
					var request = {
						url: uri,
						type: method,
						//contentType: "application/json",
						//accepts: "application/json",
						cache: false,
						//dataType: 'json',
						data: data,
						//data: JSON.stringify(data),
						/*beforeSend: function (xhr) {
							xhr.setRequestHeader("Authorization", "Basic " + btoa(self.username + ":" + self.password));
						},*/
						error: function(jqXHR) {
							console.log("ajax error " + jqXHR.status);
						}
					};
					return $.ajax(request);
				};
			}

			//ViewModel for the login dialog
			function LoginViewModel()
			{
				var self = this;
				self.username = ko.observable();
				self.password = ko.observable();

				self.login = function() {
					$('#login').modal('hide');
					tasksViewModel.login(self.username(), self.password());
				};
			}

			/*
			 * This function sends a notification to a lab monitor
			 */
			function ReportarFuncionamientoIncorrectoViewModel()
			{
				var self = this;
				self.descripcion = ko.observable();

				self.reportarFuncionamientoIncorrecto = function(){
					alert("Reportando");
				};
			}
				
			/*
			* This function pushes an object into the estadosLaboratorio field of a lab
			 */
			function GuardarEstadoViewModel()
			{
				//Declare vars
				var self = this;
				self.id = ko.observable();
				self.laboratoriosVirtuales_id = ko.observable();
				self.descripcion = ko.observable();
				self.timestamp = ko.observable();

				
				self.guardarEstado = function( task ) 
				{
					//Hide dialog
					$('#guardarEstado').modal('hide');
					
					//Send data
					tasksViewModel.crearEstadoLaboratorio({
						id: 'NULL',
						laboratoriosVirtuales_id: task.plazo ,
						descripcion: self.descripcion(),
						timestamp: 'NULL',
						op: 'crearLaboratorioVirtual'
					});
				};
				
				//Blank forms
				self.descripcion("");
			}

			var tasksViewModel = new tasksViewModel();
			var reportarFuncionamientoIncorrectoViewModel = new ReportarFuncionamientoIncorrectoViewModel();
			var guardarEstadoViewModel = new GuardarEstadoViewModel();
			//var loginViewModel = new LoginViewModel();

			ko.applyBindings(tasksViewModel, $('#main')[0]);
			//ko.applyBindings(loginViewModel, $('#login')[0]);
			ko.applyBindings(reportarFuncionamientoIncorrectoViewModel, $('#reportarFuncionamientoIncorrecto')[0]);
			ko.applyBindings(guardarEstadoViewModel, $('#guardarEstado')[0]);

		</script>
	</body>
</html>