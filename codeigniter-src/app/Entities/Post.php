<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Post extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];
	protected $casts   = [];

	protected function setSlug(string $title)
	{
		//Usamos el helper de CI para generar el slug
		$slug = mb_url_title($title, '-');
		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		/*
		* Buscamos todos los post que coincidan con el slug
		* Recorremos los resultados siempre y  cunado no sea nulo
		*/
		while ($postModel->where('slug',$slug)->find() != null) {
			//Usamos el helper de CI4 para mutar el slug
			$slug = increment_string($slug);

		}
		//Asignamos el atributo
		$this->attributes['slug'] = $slug;
	}
}
