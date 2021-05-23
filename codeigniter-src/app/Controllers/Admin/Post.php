<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Post extends BaseController
{
	public function index()
	{
		return view('admin/posts');
	}
}
