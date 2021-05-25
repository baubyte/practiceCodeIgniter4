<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

		/**
		 * Reglas de Validación para los POST / Artículos 
		 *
		 * @var array
		 */
			public $postStore = [
				'title' => [
					'label'  => 'Titulo',
					'rules'  => 'required|alpha_numeric_punct|min_length[1]',
					'errors' => [
						'required' => 'El {field} es Obligatorio.',
						'alpha_numeric_punct' => 'Solo se permiten letras.',
						'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
					]
				],
				'body' => [
					'label'  => 'Cuerpo',
					'rules'  => 'required|min_length[3]',
					'errors' => [
						'required' => 'El {field} es Obligatorio.',
						'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
					]
				],
				'published_at' => [
					'label'  => 'Fecha de Publicación',
					'rules'  => 'required|valid_date',
					'errors' => [
						'required' => 'El {field} es Obligatorio.',
						'valid_date' => 'Debe Ingresar un {field} Valida.',
					]
				],
				'categories.*' => [
					'label'  => 'Categoria',
					'rules'  => 'permit_empty|is_not_unique[categories.id]',
					'errors' => [
						'is_not_unique' => 'El {field} no se Encuentra Registrada.',
					]
				],
				'image' => [
					'label'  => 'Imagen',
					'rules'  => 'uploaded[image]|is_image[image]',
					'errors' => [
						'uploaded' => 'La {field} es Obligatoria.',
						'is_image' => 'La {field} no es un tipo Valido.',
					]
				],
			];
}
