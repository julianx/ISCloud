<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
	<head>
	<meta charset="ISO-8859-15">
	<title></title>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/php-activerecord/ActiveRecord.php';

			// initialize ActiveRecord
			// change the connection settings to whatever is appropriate for your mysql server 
			ActiveRecord\Config::initialize(function($cfg)
			{
				$cfg->set_model_directory('models');
				$cfg->set_connections(array('development' => 'mysql://iscloud1320:HGXi4xBdkA6t75v2IWvz@127.0.0.1/iscloud1320'));
			});
			
			$lab  = new LaboratorioVirtual();
			$lab->crearLaboratorioVirtual( "0", "0" );
			
			class PlantillaLaboratorioVirtual
			{
				public $identificadorEntornoLaboratorio;
				public $resultadoOperacionConversion;
				public $loginEstudiante;
				public $loginMonitor;
				
				function __construct() 
				{
					$this->identificadorEntornoLaboratorio = 0;
				}
				function guardarEstadoPlantillasMaquinasVirtualesLaboratorio( $identificadorEntornoLaboratorio )
				{
				}
				function guardarPlantillaLaboratorio( $identificadorPlantillaLaboratorio )
				{
				}
				function notificarErrorGuardarEstadoPlantillas( $resultadoOperacionConversion )
				{
				}
				function notificarReporteEntornoLaboratorio( $loginEstudiante, $identificadorEntornoLaboratorio )
				{
				}
				function obtenerListaPlantillasLaboratorio( $loginMonitor )
				{
					
				}
			}

			class LaboratorioVirtual
			{
				public $identificadorPlantillaLaboratorio;
				public $identificadorEntornoLaboratorio;
				public $identificadorLaboratorio;
				public $descripcionLaboratorio;
				public $resultadoOperacionClonado;
				public $resultadoOperacionSnapshot;
				public $resultadoOperacionEncendido;
				public $resultadoOperacionSuspension;
				public $resultadoOperacionRestaurarSnapshot;
				public $resultadoOperacionApagado;
				public $loginEstudiante;
				public $loginMonitor;
				public $identificadorEstadoEntornoLaboratorio;
		
				function persistirLaboratorioVirtual( )
				{
					$timestamp = date('Y-m-d H:i:d', strtotime('now') );
					crearEstadoLaboratorio('NULL', $_GET["identificadorLaboratorio"], $_GET["descripcionLaboratorio"], $timestamp );
				}
				
				function crearLaboratorioVirtual ( $identificadorLaboratorio, $descripcionLaboratorio )
				{
					$laboratorio = new PersistenciaLaboratorioVirtual();
					
					$laboratorio->id = 0;
					$laboratorio->fechacreacion = date('Y-m-d H:i:d', strtotime('now') );
					$laboratorio->fechaterminacion = date('Y-m-d H:i:d', strtotime('now') + 86400 * 30 );
					$laboratorio->costodeoperacion = 0.0;
					$laboratorio->titulo = 'titulo';
					$laboratorio->descripcion = 'desc';
					$laboratorio->usuario = 'mario';
					$laboratorio->password = 'secreto';
					$laboratorio->protocolo = 'RDP';
					$laboratorio->ip ='100.0.0.5';

					$laboratorio->save( );
				}
				
				function desplegarLaboratorioVirtual( $identificadorPlantillaLaboratorio)
				{
				}
				function guardarEstadoEntornoLaboratorio( $identificadorEntornoLaboratorio )
				{
				}
				function iniciarLaboratorioVirtual( $loginMonitor, $identificadorLaboratorio )
				{
				}
				function notificarErrorDesplegarLaboratorio( $resultadoOperacionClonado )
				{
				}
				function notificarErrorGuardarEstado( $resultadoOperacionSnapshot )
				{
				}
				function notificarErrorIniciarLaboratorio( $resultadoOperacionEncendido )
				{
				}
				function notificarErrorPausarEntornoLaboratorio( $resultadoOperacionSuspension )
				{
				}
				function notificarErrorRestaurarEstado( $resultadoOperacionRestaurarSnapshot )
				{
				}
				function notificarErrorTerminarEntornoLaboratorio( $resultadoOperacionApagado )
				{
				}
				function obtenerEstadosEntornoLaboratorio( $identificadorEntornoLaboratorio )
				{
				}
				function obtenerIdentificadorEntornoLaboratorio( $loginUsuario )
				{
				}
				function obtenerListaLaboratoriosActivos( $loginUsuario )
				{
					echo PersistenciaLaboratorioVirtual::obtenerListaLaboratoriosActivos( );
				}
				function pausarEntornoLaboratorio( $identificadorEntornoLaboratorio )
				{
				}
				function reportarEntornoLaboratorio( $identificadorEntornoLaboratorio )
				{
				}
				function restaurarEstadoEntornoLaboratorio( $identificadorEntornoLaboratorio, $identificadorEstadoEntornoLaboratorio )
				{
				}
				function terminarEntornoLaboratorio( $identificadorEntornoLaboratorio )
				{
					
				}
			}

			class Solicitud
			{
				public $idSolicitud;
				public $loginUsuario;
				function aceptarSolicitud( $idSolicitud )
				{

				}
				function denegarSolicitud( $idSolicitud )
				{

				}
				function notificarAceptacionSolicitud( $idSolicitud, $loginUsuario )
				{

				}
				function notificarDenegacionSolicitud( $idSolicitud, $loginUsuario )
				{
				}
				function obtenerListaSolicitudes( )
				{

				}
			}

			class Curso
			{
				public $loginMonitor;
				public $loginProfesor;

				function obtenerListaCursos( $login )
				{
					
				}
			}

			class Proyecto
			{
				public $nombreProyecto;
				public $loginProfesor;
				
				function crearProyecto( $nombreProyecto )
				{
				}
				function obtenerListaProyectos( $loginProfesor )
				{
				}

			}

			class Persona
			{
				public $login, $password;

				function getUser()
				{

				}
				function setUser()
				{

				}
			}
			
			class Sysadmin extends Persona
			{
				public $loginProfesor;
				public $idCurso;
				public $idSolicitud;
				
				function asignarCapacidadUsuario( $loginProfesor )
				{
					
				}
				function asignarCapacidadCurso( $idCurso )
				{
					
				}
				function suplirPlantillaMaquinaVirtual( )
				{
					
				}
				function aceptarPeticionPlantillaMaquinaVirtual( $idSolicitud )
				{
					
				}
				function denegarPeticionPlantillaMaquinaVirtual( $idSolicitud )
				{
					
				}
			}

			class Profesor extends Persona
			{
				public $loginProfesor;
				
				function asignarCapacidadUsuario( $loginProfesor )
				{
				}
				function obtenerListaProfesores( )
				{

				}

			}
			
			class Monitor extends Persona
			{
				
			}

			class Estudiante extends Persona
			{

			}

			class PlantillaMaquinaVirtual
			{
				
				public $identificadorPlantilla;
				public $nucleosCPU;
				public $almacenamientoSistemaOperativo;
				public $almacenamientoDatos;
				public $memoriaRam;
				public $interfacesDeRed;
				public $sistemaOperativo;
				public $aplicacionesInstaladas;
				
				function borrarPlantilla( $identificadorPlantilla )
				{

				}
				function crearPlantillaMV( $almacenamientoSistemaOperativo, $memoriaRam, $nucleosCPU, $interfacesDeRed, $almacenamientoDatos, $sistemaOperativo, $aplicacionesInstaladas )
				{

				}
				function obtenerListaPlantillas( )
				{

				}
			}

			class MaquinaVirtual
			{
				function configurarMV( $idPlantillaMV, $aplicaciones )
				{
					
				}

			}

			class InfraestructuraTecnologica
			{
				//lista $servidoresProduccion
				function obtenerEstadisticasUso( $servidoresProduccion )
				{
					
				}
			}

			class Servidor
			{

			}

			class EquipoDeRed
			{

			}

			class Almacenamiento
			{
				public $capacidadUtilizable;
				public $iopsPosibles;

			}

			class Grupo
			{
				public $identificadorCurso;
				public $identificadorGrupo;
				public $listaEstudiantes;
			
				//$grupos = array( identificadorGrupo, listaEstudiantes );
				function obtenerListaGrupos( $identificadorCurso, $grupos )
				{
					
				}
				function definirGrupos( $identificadorCurso, $grupos )
				{
					
				}
			}
			
			class PlataformaCloud
			{
				public	$loginProfesor, 
						$identificadorPlantillaLaboratorio, 
						$listaMaquinasVirtuales, 
						$idCurso, 
						$periodoAcademico, 
						$identificadorCurso, 
						$listaIdentificadoresGrupos, 
						$cantidadHoras, 
						$listaIdentificadoresPlantillas, 
						$identificadorProyecto, 
						$cantidadDias;
				
				
				function crearLaboratorioVirtual ( $identificadorLaboratorio, $descripcionLaboratorio )
				{
					// add library to the include_path
		
					set_include_path(implode(PATH_SEPARATOR, array('.','/library', get_include_path(),)));

					require_once 'VMware/VCloud/Helper.php';
					//require_once dirname(__FILE__) . '/config.php';
					//Connection parameters for vCloud Director
					$server = "vdirector.vcloud.virtual.uniandes.edu.co";
					$httpConfig = array( 
						'proxy_host'=>null,
						'proxy_port'=>null,
						'proxy_user'=>null,
						'proxy_password'=>null,
						'ssl_verify_peer'=>null,
						'ssl_verify_host'=>null,
						'ssl_cafile'=>null,
					);
					$auth = array( 'username' => "julianx@disc", 'password'=> 'emma_watson');

					$apiVersion = "1.5";
					//Parameters for my vCloud Director account
					$orgName = "disc";
					$vdcName = "DISCvDC";
					$vAppTemplateName = "templateCEL64";
					$vAppName = "New vApp";

					try
					{
						//create a service object
						$service = VMware_VCloud_SDK_Service::getService();

						//Step 1 - login to vCloud Director
						$response = $service->login($server, $auth, $httpConfig, $apiVersion);

						/*
						//lsorg - Dump organizations in which the user has permisions
						// create an SDK Query object
						$sdkQuery = VMware_VCloud_SDK_Query::getInstance($service);

						$recsObj = $sdkQuery-&gt;queryReferences("organization",null);
						foreach($recsObj-&gt;getReference() as $orgRef)
						{
							echo $orgRef-&gt;get_name() . "\n";
						}
						*/


						//Step 2 - get a reference to our organization
						//   a. Get the organization objects (in vCloud data object format).
						$orgRefs = $service->getOrgRefs( $orgName );
						if (0 == count($orgRefs))
						{
							exit("No organization with name $orgName is found<br />");
						}
						$orgRef = $orgRefs[0];
						$sdkOrg = $service->createSDKObj( $orgRef );

						//Step 3 - get a reference to out virtual datacentre
						$vdcRefs = $sdkOrg->getVdcRefs( $vdcName );
						if (0 == count($vdcRefs))
						{
							exit("No vDC with name $vdcName is found<br />");
						}
						$vdcRef = $vdcRefs[0];
						$sdkVdc = $service->createSDKObj( $vdcRef );
						/*
						//Step 4 - get a reference to our vAppTemplate
						$vAppTemplateRefs = $sdkVdc->getVAppTemplateRefs( $vAppTemplateName );
						if (!$vAppTemplateRefs)
						{
							exit("No vAppTemplate with name $vAppTempName is found<br />");
						}
						$vAppTemplateRef = $vAppTemplateRefs[0];

						//Step 5 - deploy a new vApp from out template
						echo "Instantiating vAppTemplate...<br />";
						$vapp = $sdkVdc->instantiateVAppTemplateDefault($vAppName, $vAppTemplateRef);

						$tasks = $vapp->getTasks();
						if (!empty($tasks))
						{
							$task = $tasks->getTask();
							$task = $service->waitForTask($task[0]);
							if ($task->get_status() != 'success')
							{
								exit("Failed instantiating vAppTemplate.<br />");
							}
						}
						echo "Successfully instantiatiated vAppTemplate.<br />";
						*/

						// a. Get a reference to the newly created vApp from vDC.
						$vAppRefs = $sdkVdc->getVAppRefs($vAppName);
						// b. Create an SDK vApp object.
						$sdkVApp = $service->createSDKObj($vAppRefs[0]);
						// c. Create a VMware_VCloud_API_DeployVAppParamsType data object.
						//$params = createDeployVAppParamsTypeObj();
						// d. Deploy and power on the vApp.
						$vApp = $sdkVApp->getVApp();

						$status = vAppStatusTranslation(  $sdkVApp->getStatus( $vApp ) );
						
						echo "vApp Status: " . $status . "<br />";

						echo "###############################################<br />";
						echo " 8. Getting information about the vApp<br />";
						echo "###############################################<br />";
						//   a. Retrieve the vApp data object.
						$vApp = $sdkVApp->getVApp();
						//   b. Display the content of the vApp.
						print( "<pre>". print_r( $vApp->export(), true) . "</pre>" );

						echo "###############################################<br />";
						echo " 9. Deleting the vApp<br />";
						echo "###############################################<br />";


						//   a. Create a VMware_VCloud_API_DeployVAppParamsType data object.
						//$uParams = createUnDeployVAppParamsTypeObj();
						//   b. Power off and undeploy the vApp. Wait for the task to finish
						//$task = $sdkVApp->undeploy( $vApp );
						//$service->waitForTask($task);
						//   c. Delete the vApp.
						$sdkVApp->delete();


						//Log out
						$service->logout();


					} catch (Exception $ex) 
					{
						echo $ex->getMessage() . "<br />";
					}
				}
				
				function vAppStatusTranslation ( $codeNumber )
				{
					switch ( $codeNumber )
					{
						case "-1":
						$status = "FAILED_CREATION(-1) - Transient entity state, e.g., model object is created but the corresponding VC backing does not exist yet. ";
						break;
						case "0":
						$status = "UNRESOLVED(0) - Entity is whole, e.g., VM creation is complete and all the required model objects and VC backings are created. ";
						break;
						case "1":
						$status = "RESOLVED(1) - Entity is resolved.";
						break;
						case "2":
						$status = "DEPLOYED(2) - Entity is deployed.";
						break;
						case "3":
						$status = "SUSPENDED(3) - All VMs of the vApp are suspended. ";
						break;
						case "4":
						$status = "POWERED_ON(4) - All VMs of the vApp are powered on.";
						break;
						case "5":
						$status = "WAITING_FOR_INPUT(5) - VM is pending response on a question.";
						break;
						case "6":
						$status = "UNKNOWN(6) - Entity state could not be retrieved from the inventory, e.g., VM power state is null.";
						break;
						case "7":
						$status = "UNRECOGNIZED(7) - Entity state was retrieved from the inventory but could not be mapped to an internal state. ";
						break;
						case "8":
						$status = "POWERED_OFF(8) - All VMs of the vApp are powered off.";
						break;
						case "9":
						$status = "INCONSISTENT_STATE(9) Apply to VM status, if a vm is POWERED_ON, or WAITING_FOR_INPUT, but is undeployed, it is in inconsistent state. ";
						break;
						case "10":
						$status = "MIXED(10) - vApp status is set to MIXED when the VMs in the vApp are in different power states.";
						break;
						default :
						$status = "Not defined";
						break;
					}
					return $status;
				}
				
				function actualizarCapacidadDisponible( $loginProfesor, $identificadorPlantillaLaboratorio )
				{

				}
				function apagarLaboratorioVirtual( $listaMaquinasVirtuales )
				{

				}
				function asignarCapacidadCurso( $idCurso )
				{

				}
				function asignarCapacidadUsuario( $loginProfesor )
				{

				}
				function clonarLaboratorioVirtual( $listaMaquinasVirtuales )
				{
					
				}
				function convertirMaquinasEnPlantillasBase( $listaMaquinasVirtuales )
				{
					
				}
				function crearSnapshotEntornoLaboratorio( $listaMaquinasVirtuales )
				{
					
				}
				function iniciarLaboratorioVirtual( $listaMaquinasVirtuales )
				{
					
				}
				function obtenerCantidadDiasDisponibles( $loginProfesor )
				{
					
				}
				function obtenerCantidadHorasDisponibles( $loginProfesor )
				{
					
				}
				function obtenerPorcentajeUtilizacion( $periodoAcademico )
				{
						
				}
				function restaurarSnapshotEntornoLaboratorio( $listaMaquinasVirtuales )
				{
					
				}
				function seleccionarCurso( $identificadorCurso )
				{
					
				}
				function seleccionarGrupos( $listaIdentificadoresGrupos )
				{
					
				}
				function seleccionarPlantilla( $listaIdentificadoresPlantillas )
				{
					
				}
				function seleccionarProyecto( $identificadorProyecto )
				{
					
				}
				function solicitarCantidadDias( $loginProfesor, $identificadorPlantillaLaboratorio, $cantidadDias )
				{
					
				}
				function solicitarCantidadHoras( $loginProfesor, $identificadorPlantillaLaboratorio, $cantidadHoras )
				{
					
				}
				function suspenderLaboratorioVirtual( $listaMaquinasVirtuales )
				{
					
				}
			}
		?> 
	</body>
</html>
