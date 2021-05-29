<?php

namespace App\Controllers\Front;

/** Lamamos a BaseController */

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
	public function index()
	{

		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		$posts = $postModel->published()->orderBy('created_at', 'DESC')->paginate(config('Blog')->regPerPage);
		/**Obtenemos las paginas*/
		$pager = $postModel->pager;
		//Cargamos el helper para poder usar character_limiter en la vista
		helper('text');
		return view('front/home', ['posts' => $posts, 'pager' => $pager]);
	}

	/**
	 * Retorna las vista con el articulo filtrado
	 *
	 * @param string $slug
	 * @return view
	 */
	public function article(string $slug)
	{
		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		$post = $postModel->published()->where('slug', $slug)->first();
		if ($post == null) {
			//si no la encuentra desencadenamos un excepción
			throw PageNotFoundException::forPageNotFound();
		}
		return view('front/article', ['post' => $post]);
	}
	/**
	 * Filtros para los los view cells
	 *
	 * @param array $args
	 * @return view
	 */
	public function filter(array $args)
	{
		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		//Cargamos el helper para poder usar character_limiter en la vista
		helper('text');
		$posts = $postModel->getPostByCategory($args['category'])->findAll($args['limit'] ?? 0);
		return view('front/filter', ['posts' => $posts]);
	}
}
