<?php

namespace App\Entities;

use CodeIgniter\Entity;
//Librería pra hashear los ids
use Hashids\Hashids;

class Post extends Entity
{
	protected $datamap = [];
	//Agregamos published_at para poder usar despues humineze()
	protected $dates   = [
		'published_at',
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
		while ($postModel->where('slug', $slug)->find() != null) {
			//Usamos el helper de CI4 para mutar el slug
			$slug = increment_string($slug);
		}
		//Asignamos el atributo
		$this->attributes['slug'] = $slug;
	}

	/**
	 * Relaciones entre la entidad Post y Usuarios
	 * para poder obtener el autor
	 *
	 * @return userinfo
	 */
	protected function getAuthor()
	{
		/**
		 * Validamos si es que tiene un id de usuarios
		 * caso contrario retornamos la entidad POST
		 */
		if (!empty($this->attributes['user_id'])) {
			//Llamamos la modelo
			$userInfoModel = model('UserInfoModel');
			//Buscamos la información de ese usuario
			$userInfo = $userInfoModel->where('user_id', $this->attributes['user_id'])->first();
			return $userInfo;
		}
		return $this;
	}

	/**
	 * Busca las categorias de la entidad post
	 *
	 * @return Category
	 */
	public function getCategories()
	{
		$categorypostModel = model('CategorypostModel');
		return $categorypostModel
								->select('categories.id,categories.name')
								->where('post_id', $this->id)->join('categories', 'categories.id = categories_posts.category_id')->findAll() ?? [];
	}


	/**
	 * Genera el enlace simbólico hacia las imágenes
	 *
	 * @return void
	 */
	public function getLinkImage()
	{
		return base_url('uploads/images/' . $this->image);
	}
	/**
	 * Genera el enlace para el articulo
	 * @return void
	 */
	public function getRouteArticle()
	{
		return base_url(route_to('article',$this->slug));
	}
	/**
	 * Genera la ruta que permite llamar al método de 
	 * edición de controlador y ademas pasa el id de la 
	 * entidad como parámetro
	 *
	 * @return url
	 */
	public function getRouteEdit()
	{
		return base_url(route_to('post_edit', $this->getEncodeId()));
	}

	/**
	 * Genera la ruta que permite llamar al método de 
	 * eliminación de controlador y ademas pasa el id de la 
	 * entidad como parámetro
	 *
	 * @return url
	 */
	public function getRouteDelete()
	{
		return base_url(route_to('post_delete', $this->getEncodeId()));
	}
	/**
	 * Realiza el Hash del id
	 *
	 * @return idEncode
	 */
	public function getEncodeId()
	{
		//Instaríamos el hashid
		$hashId = new Hashids();
		$idEncode = $hashId->encode($this->id);
		return $idEncode;
	}
}