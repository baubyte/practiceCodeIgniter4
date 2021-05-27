<?php

namespace App\Controllers\Front;

/** Lamamos a BaseController */
use App\Controllers\BaseController;

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
		return view('front/home',['posts' => $posts, 'pager' => $pager]);
	}
}
