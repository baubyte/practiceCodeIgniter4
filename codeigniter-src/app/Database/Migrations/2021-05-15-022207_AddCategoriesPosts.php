<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoriesPosts extends Migration
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
			'post_id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'null' => true
			],
			'category_id'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
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
		$this->forge->addForeignKey('post_id','posts','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('category_id','categories','id','CASCADE','CASCADE');
		$this->forge->createTable('categories_posts');
	}

	public function down()
	{
		$this->forge->dropTable('categories_posts');
	}
}
