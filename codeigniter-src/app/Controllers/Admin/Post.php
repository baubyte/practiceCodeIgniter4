<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


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
		dd($this->request->getPost());
	}
}
