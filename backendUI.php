<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	//$post = json_decode ( $_POST, TRUE );
	if ( $_GET["op"] == "crearLaboratorioVirtual" )
	//if ( $post.op == "crearLaboratorioVirtual")
	{
		require_once __DIR__ . '/php-activerecord/ActiveRecord.php';
		require_once __DIR__ . '/models/EstadoLaboratorio.php';		

		// initialize ActiveRecord
		// change the connection settings to whatever is appropriate for your mysql server 
		ActiveRecord\Config::initialize(function($cfg)
		{
			$cfg->set_model_directory('models');
			$cfg->set_connections(array('development' => 'mysql://iscloud1320:HGXi4xBdkA6t75v2IWvz@127.0.0.1/iscloud1320'));
		});
		$timestamp = date('Y-m-d H:i:d', strtotime('now') );
		crearEstadoLaboratorio('NULL', $_GET["laboratoriosVirtuales_id"], $_GET["descripcion"], $timestamp );
	}
?>