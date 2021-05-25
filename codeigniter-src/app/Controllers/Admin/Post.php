<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Entities\Post as PostEntity;

class Post extends BaseController
{
	/**
	 * Devuelve la vista con el listado 
	 * de todos los artículos
	 *
	 * @return view
	 */
	public function index()
	{
		return view('admin/post/posts');
	}

	/**
	 * Devuelve la el formulario de alta de 
	 * articulo
	 *
	 * @return view
	 */
	public function create()
	{
		/**Lamamos al Modelo */
		$categoryModel = model('CategoryModel');
		/**Obtenemos los registros paginados */
		$categories = $categoryModel->findAll();
		return view('admin/post/post_create',['categories' => $categories]);
	}

	public function store()
	{
		//Validamos lo datos
		if ($this->validate('postStore') === false) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}
		/**Entidad Post asignamos las propiedades*/
		$post = new PostEntity($this->request->getPost());
		//Seteamos el slug
		$post->slug = $this->request->getVar('title');
		//Seteamos el usuario
		$post->user_id = session()->user_id;
		//Subimos el Archivo

		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		/**Insertamos el Post */
		$postModel->save($post);
	}
}
