<?php

namespace App\Entities;

use CodeIgniter\Entity;
//Librería pra hashear los ids
use Hashids\Hashids;

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
		return base_url(route_to('category_edit', $this->getEncodeId()));
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
		return base_url(route_to('category_delete', $this->getEncodeId()));
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
