<?php

namespace App\Models;

use CodeIgniter\Model;

/**Usamos la Entidad Usuario y UserInfo*/
use App\Entities\User;
use App\Entities\UserInfo;

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

	//Fields
	protected $assignGroup;
	protected $userInfo;

	//Callbacks
	protected $beforeInsert = ['addGroup'];
	protected $afterInsert = ['storeUserInfo'];


	/**
	 * Asigna un grupo al usuario al ser insertado
	 *
	 * @param [array] $data
	 * @return $data
	 */
	protected function addGroup($data)
	{
		$data['data']['group_id'] = $this->assignGroup;
		return $data;
	}
	protected function storeUserInfo($data)
	{
		/**Asignamos el valor del id del usuario que se inserto 
		 * para luego inserte al información del usuario
		*/
		$this->userInfo->user_id = $data['id'];
		//Llamamos la modelo
		$userInfoModel = model('UserInfoModel');
		//Insertamos los datos
		$userInfoModel->insert($this->userInfo);

	}
	/**
	 * Busca el grupo por nombre y 
	 * lo asigna a la propiedad $assignGroup
	 * 
	 * @param string $group
	 * @return void
	 */	
	public function withGroup(string $group)
	{
		$result = $this->db->table('groups')
							->where('name', $group)
							->get()->getFirstRow();
		if ($result != null) {
			$this->assignGroup = $result->id;
		}
	}

	public function addUserInfo(UserInfo $userInfo)
	{
		$this->userInfo = $userInfo;
	}
}
