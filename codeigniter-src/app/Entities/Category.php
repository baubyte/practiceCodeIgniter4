<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Category extends Entity
{
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * Genera la ruta que permite llamar al método de 
	 * edición de controlador y ademas pasa el id de la 
	 * entidad como parámetro
	 *
	 * @return url
	 */
	public function getRouteEdit()
	{
		return base_url(route_to('category_edit', $this->id));
	}
}
