<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class Curso extends ActiveRecord\Model
	{
		# explicit table name since our table is not "books" 
		static $table_name = 'cursos';

		# explicit pk since our pk is not "id" 
		static $primary_key = 'crn';

		# explicit connection name since we always want our test db with this model
		#static $connection = 'test';

		# explicit database name will generate sql like so => my_db.my_book
		#static $db = 'my_db';
		function before_create()
		{
			$this->date_added = date('Y-m-d H:i:d', strtotime('now') );
		}
		function before_update()
		{
			$this->date_modded = date('Y-m-d H:i:d', strtotime('now') );
		}
		
		function obtenerLista( )
		{
			$post = Post::find(1);
			echo $post->title; # 'My first blog post!!'
			echo $post->author_id; # 5

			# also the same since it is the first record in the db
			$post = Post::first();

			# using dynamic finders
			$post = Post::find_by_name('The Decider');
			$post = Post::find_by_name_and_id('The Bridge Builder',100);
			$post = Post::find_by_name_or_id('The Bridge Builder',100);

			# using some conditions
			$posts = Post::find('all',array('conditions' => array('name=?','The Bridge Builder')));
		}
	}

?>