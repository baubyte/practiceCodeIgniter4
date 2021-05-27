<?php

namespace App\Entities;

use CodeIgniter\Entity;
use PhpParser\Node\Expr\Cast\String_;


class UserInfo extends Entity
{
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];

	/**
	 * Mutator para obtener el nombre completo
	 *
	 * @return void
	 */
	public function getFullName()
	{
		return $this->name . ' ' . $this->surname;
	}
}
