<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
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
			'group_id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'null' => true
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '120',
				'unique' => true,
				'null' => false
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'unique' => true,
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
		$this->forge->addForeignKey('group_id','groups','id','CASCADE','SET NULL');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
