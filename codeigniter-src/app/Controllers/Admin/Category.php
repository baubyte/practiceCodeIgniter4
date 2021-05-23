<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Category as EntitiesCategory;
use CodeIgniter\Exceptions\PageNotFoundException;
//Librería pra hashear los ids
use Hashids\Hashids;

class Category extends BaseController
{
	/**
	 * Devuelve las vista con todas las categorías
	 *
	 * @return view
	 */
	public function index()
	{
		/**Lamamos al Modelo */
		$categoryModel = model('CategoryModel');
		/**Obtenemos los registros paginados */
		$categories = $categoryModel->orderBy('created_at', 'DESC')->paginate(config('Blog')->regPerPage);
		/**Obtenemos las paginas*/
		$pager = $categoryModel->pager;
		return view('admin/category/categories', ['categories' => $categories, 'pager' => $pager]);
	}

	/**
	 * Devuelve la el formulario de alta de 
	 * categoria
	 *
	 * @return view
	 */
	public function create()
	{
		return view('admin/category/category_create');
	}
	/**
	 * Guarda la categoria
	 *
	 * @return void
	 */
	public function store()
	{
		if ($this->validateCategoryStore() === true) {
			/**Entidad Categoria asignamos las propiedades*/
			$category = new EntitiesCategory($this->request->getPost());
			/**Lamamos al Modelo */
			$categoryModel = model('CategoryModel');
			/**Insertamos la Categoria */
			$categoryModel->insert($category);
			return redirect()->route('categories')->with('msg', [
				'type' => 'success',
				'header' => '¡Éxito! 😬',
				'body' => 'La Categoria se Guardo Correctamente.'
			]);
		} else {
			return redirect()->back()->withInput()->with('msg', [
				'type' => 'danger',
				'header' => '¡Ups! 😱',
				'body' => 'Surgieron Errores.'
			])->with('errors', $this->validateCategoryStore());
		}
	}
	/**
	 * Busca la categoria por le id
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
		$categoryModel = model('CategoryModel');
		//Buscamos la categoria por el id
		$category = $categoryModel->find($id);
		if ($category == false) {
			//si no la encuentra desencadenamos un exenció
			throw PageNotFoundException::forPageNotFound();
		} else {
			return view('admin/category/category_edit', ['category' => $category]);
		}
	}
	/**
	 * Realiza la actualización de los datos
	 * modificados de la categoria
	 *
	 * @return void
	 */
	public function update()
	{
		if ($this->validateCategoryUpdate() === true) {
			/**Entidad Categoria asignamos las propiedades*/
			$category = new EntitiesCategory($this->request->getPost());
			/**Lamamos al Modelo */
			$categoryModel = model('CategoryModel');
			/**Insertamos la Categoria */
			$categoryModel->save($category);
			return redirect()->route('categories')->with('msg', [
				'type' => 'success',
				'header' => '¡Éxito! 😬',
				'body' => 'La Categoria se Actualizo Correctamente.'
			]);
		} else {
			return redirect()->back()->withInput()->with('msg', [
				'type' => 'danger',
				'header' => '¡Ups! 😱',
				'body' => 'Surgieron Errores.'
			])->with('errors', $this->validateCategoryUpdate());
		}
	}
	public function delete(string $id)
	{
		//Recibimos y lo decodificamos
		$id = $this->getDecodeId($id);
		/**Lamamos al Modelo */
		$categoryModel = model('CategoryModel');
		/**Eliminamos la Categoria */
		$categoryModel->delete($id);
		return redirect()->route('categories')->with('msg', [
			'type' => 'success',
			'header' => '¡Éxito! 😬',
			'body' => 'La Categoria se Elimino Correctamente.'
		]);
	}
	/**
	 * Se encarga de validar el campo de Categoría
	 * al dar de alta
	 *
	 * @return boolean
	 */
	public function validateCategoryStore()
	{
		//Llamamos al servicio de validación
		$validation = service('validation');
		//Seteamos las reglas
		$validation->setRules([
			'name' => [
				'label'  => 'Nombre',
				'rules'  => 'required|alpha_numeric_punct|min_length[3]|max_length[120]',
				'errors' => [
					'required' => 'El {field} es Obligatorio.',
					'alpha_numeric_punct' => 'Solo se permiten letras y Signos de Puntuación.',
					'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
					'max_length' => 'El {field} debe ser menor a 120 Caracteres.',
				],
			],
		]);
		//Comprobamos si pasa la validación
		if ($validation->withRequest($this->request)->run() === false) {
			return $validation->getErrors();
		}
		return true;
	}
	/**
	 * Se encarga de validar el campo de Categoría
	 * al actualizar
	 *
	 * @return boolean
	 */
	public function validateCategoryUpdate()
	{
		//Llamamos al servicio de validación
		$validation = service('validation');
		//Seteamos las reglas
		$validation->setRules([
			'name' => [
				'label'  => 'Nombre',
				'rules'  => 'required|alpha_numeric_punct|min_length[3]|max_length[120]',
				'errors' => [
					'required' => 'El {field} es Obligatorio.',
					'alpha_numeric_punct' => 'Solo se permiten letras y Signos de Puntuación.',
					'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
					'max_length' => 'El {field} debe ser menor a 120 Caracteres.',
				],
			],
			'id' => [
				'label'  => 'Identificador',
				'rules'  => 'required|is_not_unique[categories.id]',
				'errors' => [
					'required' => 'El {field} es Obligatorio.',
					'is_not_unique' => 'El {field} no es Valido.',
				],
			],
		]);
		//Comprobamos si pasa la validación
		if ($validation->withRequest($this->request)->run() === false) {
			return $validation->getErrors();
		}
		return true;
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
		$idDecode =$hashId->decode($id);
		return  array_shift($idDecode);
	}
}
