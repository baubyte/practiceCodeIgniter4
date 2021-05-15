<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersInfo extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'null' => true
			],
			'country_id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'null' => true
			],
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'surname'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => false
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => false,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('country_id','countries','id','CASCADE','SET NULL');
		$this->forge->createTable('users_info');
	}

	public function down()
	{
		$this->forge->dropTable('users_info');
	}
}
