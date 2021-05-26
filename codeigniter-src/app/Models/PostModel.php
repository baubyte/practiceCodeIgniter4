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
	protected $allowedFields        = ['user_id', 'title', 'slug', 'body', 'image', 'published_at'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Callbacks
	protected $allowCallbacks       = true;
	protected $afterInsert          = ['storeCategories'];
	
	//Protected Attribute
	protected $categories = [];

	/**
	 * Insertamos las categorias del post luego de haber sido inserta
	 * mediate el callback
	 *
	 * @param array $data
	 * @return $data
	 */
	protected function storeCategories(array $data)
	{
		//comparamos que no sea vació
		if (! empty($this->categories)) {
			$categorypostModel = model('CategorypostModel');
			$categories = [];
			foreach ($this->categories as $category) {
				$categories[] = [
					'category_id' => $category,
					'post_id'  => $data['id']
				];
			}
			//Hacemos el insert Batch
			$categorypostModel->insertBatch($categories); 
		}
		return $data;
	}

	/**
	 * Asigna las categorías al la propiedad
	 *
	 * @param array $categories
	 * @return void
	 */
	public function assignCategories(array $categories = [])
	{
		$this->categories = $categories;
	}
}

