<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosts extends Migration
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
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '120',
				'null' => false
			],
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '150',
				'unique' => false,
				'null' => false
			],
			'body'       => [
				'type'       => 'TEXT',
				'null' => true
			],
			'image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '40',
				'null' => true
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
		$this->forge->addForeignKey('user_id','users','id','CASCADE');
		$this->forge->createTable('posts');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
