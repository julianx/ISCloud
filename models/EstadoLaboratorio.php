<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class EstadoLaboratorio extends ActiveRecord\Model
	{
		# explicit table name since our table is not "books" 
		static $table_name = 'estadosLaboratorio';
	}
	
	function crearEstadoLaboratorio( $id, $laboratoriosVirtuales_id, $descripcion, $timestamp )
	{
		$estadoLaboratorio = EstadoLaboratorio::create(array(
			'id' => $id,
			'laboratoriosVirtuales_id' => $laboratoriosVirtuales_id,
			'descripcion' => $descripcion,
			'timestamp' => $timestamp
		));
	}

?>