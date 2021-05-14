<?php

namespace App\Controllers\Front;

/** Lamamos a BaseController */
use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		return view('Front/home');
	}
}
