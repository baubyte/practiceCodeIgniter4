<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Category extends BaseController
{
	/**
	 * Devuelve las vista con todas las categorías
	 *
	 * @return view
	 */
	public function index()
	{
		return view('admin/categories');
	}

	/**
	 * Devuelve la el formulario de alta de 
	 * categoria
	 *
	 * @return view
	 */
	public function create()
	{
		return view('admin/category_create');
	}
	/**
	 * Guarda la categoria
	 *
	 * @return void
	 */
	public function store()
	{
		if ($this->validateCategory() === true) {
			dd($this->request->getPost());
		} else {
			return redirect()->back()->withInput()->with('msg', [
				'type' => 'danger',
				'header' => '¡Ups! 😱',
				'body' => 'Surgieron Errores.'
			])->with('errors', $this->validateCategory());
		}
	}

	/**
     * Se encarga de validar el campo de Categoría
     *
     * @return boolean
     */
    public function validateCategory()
    {
        //Llamamos al servicio de validación
        $validation = service('validation');
        //Seteamos las reglas
        $validation->setRules([
            'name' => [
                'label'  => 'Nombre',
                'rules'  => 'required|alpha_space|min_length[3]|max_length[120]',
                'errors' => [
                    'required' => 'El {field} es Obligatorio.',
                    'alpha_space' => 'Solo se permiten letras.',
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
}
