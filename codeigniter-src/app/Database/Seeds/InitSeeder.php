<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
	public function run()
	{
		//Llamamos a los Seeders
		$this->call('CountriesSeeder');
		$this->call('GroupsSeeder');
	}
}
