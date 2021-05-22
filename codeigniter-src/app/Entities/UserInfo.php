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
}
