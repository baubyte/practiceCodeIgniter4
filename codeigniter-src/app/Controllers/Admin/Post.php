<?php

namespace App\Controllers\Admin;

use Hashids\Hashids;

use App\Controllers\BaseController;
use App\Entities\Post as PostEntity;
use CodeIgniter\Exceptions\PageNotFoundException;

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
		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		/**Obtenemos los registros paginados */
		$posts = $postModel->orderBy('created_at', 'DESC')->paginate(config('Blog')->regPerPage);
		/**Obtenemos las paginas*/
		$pager = $postModel->pager;
		return view('admin/post/posts', ['posts' => $posts, 'pager' => $pager]);
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
		return view('admin/post/post_create', ['categories' => $categories]);
	}

	/**
	 * Realiza las validaciones y ly guarda en 
	 * base de datos el articulo
	 *
	 * @return void
	 */
	public function store()
	{
		//Validamos lo datos
		if ($this->validate('postStore') === false) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}
		//Capturamos el Archivo el Archivo
		$file = $this->request->getFile('image');
		/**Entidad Post asignamos las propiedades*/
		$post = new PostEntity($this->request->getPost());
		//Seteamos el slug
		$post->slug = $this->request->getVar('title');
		//Seteamos el usuario
		$post->user_id = session()->user;
		//Generamos un nombre al azar y asignamos
		$post->image = $file->getRandomName();
		/**Lamamos al Modelo */
		$postModel = model('PostModel');
		/**Asignamos las categorías al post */
		$postModel->assignCategories($this->request->getPost('categories'));
		/**Insertamos el Post */
		$postModel->insert($post);
		//Guardamos el archivo
		$path = $file->store('images/', $post->image);
		return redirect()->route('posts')->with('msg', [
			'type' => 'success',
			'header' => '¡Éxito! 😬',
			'body' => 'El Articulo se Agrego Correctamente.'
		]);
	}
	/**
	 * Busca el articulo por le id
	 * y los pinta en la vista
	 *
	 * @param string $id
	 * @return view
	 */
	public function edit(string $id)
	{
		//Recibimos y lo decodificamos
		$id = $this->getDecodeId($id);
		//dd($id);
		//Llamamos al Modelo
		$postModel = model('PostModel');
		//Buscamos la categoria por el id
		$post = $postModel->where('id', $id)->first();
		/**Lamamos al Modelo */
		$categoryModel = model('CategoryModel');
		/**Obtenemos los registros paginados */
		$categories = $categoryModel->findAll();
		if ($post == null) {
			//si no la encuentra desencadenamos un excepción
			throw PageNotFoundException::forPageNotFound();
		} else {
			return view('admin/post/post_edit', ['post' => $post, 'categories' => $categories]);
		}
	}
	public function update()
	{
		$post = new PostEntity($this->request->getPost());
		dd($post);

	}
	/**
	 * Se encarga de decodificar el id que recibimos
	 *
	 * @param string $id
	 * @return idDecode
	 */
	public function getDecodeId(string $id)
	{
		//Instaríamos el hashid
		$hashId = new Hashids();
		$idDecode = $hashId->decode($id);
		return  array_shift($idDecode);
	}
}
