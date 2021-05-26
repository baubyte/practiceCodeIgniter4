<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorypostModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categories_posts';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['post_id', 'category_id'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
