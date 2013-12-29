<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class PersistenciaLaboratorioVirtual extends ActiveRecord\Model
	{
		# explicit table name since our table is not "books" 
		static $table_name = 'laboratoriosVirtuales';

		# explicit pk since our pk is not "id" 
		static $primary_key = 'id';
		
		function obtenerListaLaboratoriosActivos( )
		{
			$listaLaboratoriosActivos = self::all();
			/*echo $listaLaboratoriosActivos->title; # 'My first blog post!!'
			echo $listaLaboratoriosActivos->author_id; # 5

			# also the same since it is the first record in the db
			$listaLaboratoriosActivos = Post::first();

			# using dynamic finders
			$listaLaboratoriosActivos = Post::find_by_name('The Decider');
			$listaLaboratoriosActivos = Post::find_by_name_and_id('The Bridge Builder',100);
			$listaLaboratoriosActivos = Post::find_by_name_or_id('The Bridge Builder',100);

			# using some conditions
			$posts = Post::find('all',array('conditions' => array('name=?','The Bridge Builder')));

			 */
			return $listaLaboratoriosActivos;
		}
		
		/*
		 * 		self.id = ko.observable();
				self.fechaCreacion = ko.observable();
				self.fechaTerminacion = ko.observable();
				self.costoDeOperacion = ko.observable();
				self.titulo = ko.observable();
				self.descripcion = ko.observable();
				self.usuario = ko.observable();
				self.password = ko.observable();
				self.protocolo = ko.observable();
				self.ip = ko.observable();
						id: self.id(),
						fechaCreacion: self.fechaCreacion(),
						fechaTerminacion: self.fechaTerminacion(),
						costoDeOperacion: self.costoDeOperacion(),
						titulo: self.titulo(),
						descripcion: self.descripcion(),
						usuario: self.usuario(),
						password: self.password(),
						protocolo: self.protocolo(),
						ip: self.ip()
		
*/
	}
?>