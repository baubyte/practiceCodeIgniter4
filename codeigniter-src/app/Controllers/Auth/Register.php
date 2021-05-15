<?php

namespace App\Controllers\Auth;

/** Lamamos a BaseController */
use App\Controllers\BaseController;


/**Lamamos al la Entidad Usuario */
use App\Entities\User;

class Register extends BaseController
{

    //Propiedad en ala caulse cargan las configuraciones
    protected $configs;
    public function __construct()
    {
        $this->configs = config('Blog');
    }
    /**
     * Muestra el Formulario de Registro
     *
     * @return view
     */
	public function index()
	{
        $data = [
            'email' =>'baubyte@gmail.com',
            'password' =>'123456789',
            'name' =>'BAUBYTE',
            'surname' =>'BAUBYTE',
            'group_id' => 2,
            'country_id' => 10,
        ];
        /**Entidad Usuario */
        $user = New User($data);
        $user->generateUsername();
        /**Lamamos al Modelo */
        $userModel = model('UserModel');
        /**Insertamos el Usuario */
        //$userModel->insert($user);
        d($this->configs);
		return view('auth/register');
	}

    
}