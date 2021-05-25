<?php

namespace App\Models;

use App\Entities\Post;
use CodeIgniter\Model;

class PostModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'posts';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = Post::class;
	protected $useSoftDeletes        = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['title', 'slug', 'body', 'image', 'published_at'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Callbacks
	protected $allowCallbacks       = true;
	protected $afterInsert          = [];
}
