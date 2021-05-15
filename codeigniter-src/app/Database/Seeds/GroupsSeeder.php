<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupsSeeder extends Seeder
{
	public function run()
	{
		//Generamos los Grupos
		$groups = [
			[
				'name' => 'Admin',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			],
			[
				'name' => 'User',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			],
		];
		//Configuramos el Builder para Groups
		$builder = $this->db->table('groups');
		//Insertamos los grupos
		$builder->insertBatch($groups);
	}
}
