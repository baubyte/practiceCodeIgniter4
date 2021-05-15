<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
/**Usamos Faker */
use Faker\Factory;

class CountriesSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create();
		//Array para almacenar los paises
		$countries = [];
		//Generamos los paises
		for ($i = 0; $i < 15; $i++) {
			//Para las fechas
			$created_at = $faker->dateTime();
			$updated_at = $faker->dateTimeBetween($created_at);
			//Push al Array
			$countries[] = [
				'name' => $faker->country(),
				'created_at' => $created_at->format('Y-m-d H:i:s'),
				'updated_at' => $updated_at->format('Y-m-d H:i:s')
			];
		}
		//Configuramos el Builder para Countries
		$builder = $this->db->table('countries');
		//Insertamos los paises
		$builder->insertBatch($countries);
	}
}
