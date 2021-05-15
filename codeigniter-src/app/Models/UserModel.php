<?php

namespace App\Models;

use CodeIgniter\Model;

/**Usamos la Entidad Usuario */
use App\Entities\User;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = User::class;
	protected $useSoftDelete        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['username','email','password','group_id'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	protected $assignGroup;

	public function withGroup(string $group)
	{
		$result = $this->db->table('groups')
							->where('name', $group)
							->get()->getFirstRow();
		if ($result != null) {
			$this->assignGroup = $result->id;
		}
	}

}
