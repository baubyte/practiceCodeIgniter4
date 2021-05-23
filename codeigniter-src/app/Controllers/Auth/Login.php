<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

class Login extends BaseController
{

	public function index()
	{
		if (!session()->is_logged) {
			return view('auth/login');
		}
		return redirect()->route('posts');
	}

	/**
	 * Método que se encarga de validar las credenciales para poder
	 * iniciar sesión
	 *
	 * @return redirect
	 */
	public function signin()
	{

		if ($this->validationUserLogin() === true) {
			//Recibimos el Email
			$email = trim($this->request->getVar('email'));
			//Recibimos la Contraseña
			$password = trim($this->request->getVar('password'));
			//Llamamos al modelo de usuario
			$userModel = model('UserModel');
			//Buscamos el usuario
			$user = $userModel->getUserBy('email', $email);
			//Verificamos Contraseña y el Usuario
			if (($user === false) or (password_verify($password, $user->password) === false)) {
				return redirect()->back()->with('msg', [
					'type' => 'danger',
					'header' => '¡Ups! 😱',
					'body' => 'Usuario o Contraseña son Inválidos.'
				]);
			} else {
				//Array con los datos del Usuario
				$datosUsuario = [
					'id'  => $user->id,
					'username'  => $user->username,
					'email'     => $user->email,
					'is_logged' => true
				];
				//Setamos la sesion
				session()->set($datosUsuario);
				//Redireccionamos
				return redirect('')->route('posts')->with('msg', [
					'type' => 'success',
					'header' => '¡Hola! 👋',
					'body' => 'Bienvenido Nuevamente.'. $user->username
				]);
			}
		} else {
			return redirect()->back()->withInput()->with('errors', $this->validationUserLogin());
		}
	}
	
	/**
	 * Cierra la sesión del usuario
	 *
	 * @return redirect
	 */
	public function signout()
	{
		//DEstruimos la sesion
		session()->destroy();
		//Redireccionamos al Login
		return redirect()->route('login');
	}
	/**
	 * Se encarga de validar los campos del usuario para el login
	 *
	 * @return boolean
	 */
	public function validationUserLogin()
	{
		//Llamamos al servicio de validación
		$validation = service('validation');
		//Seteamos las reglas
		$validation->setRules([
			'email' => [
				'label'  => 'Correo Electrónico',
				'rules'  => 'required|valid_email',
				'errors' => [
					'required' => 'El {field} es Obligatorio.',
					'valid_email' => 'Debe Ingresar un {field} Valido.',
				]
			],
			'password' => [
				'label'  => 'Contraseña',
				'rules'  => 'required|min_length[6]',
				'errors' => [
					'required' => 'La {field} es Obligatoria.',
					'min_length' => 'La {field} debe tener al menos 6 Caracteres.',
				]
			],

		]);
		//Comprobamos si pasa la validación
		if ($validation->withRequest($this->request)->run() === false) {
			return $validation->getErrors();
		}
		return true;
	}

}
