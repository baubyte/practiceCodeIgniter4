<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
	/**
	 * Do whatever processing this filter needs to do.
	 * By default it should not return anything during
	 * normal execution. However, when an abnormal state
	 * is found, it should return an instance of
	 * CodeIgniter\HTTP\Response. If it does, script
	 * execution will end and that Response will be
	 * sent back to the client, allowing for error pages,
	 * redirects, etc.
	 *
	 * @param RequestInterface $request
	 * @param array|null       $arguments
	 *
	 * @return mixed
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		//Comprobamos si esta logeado
		if (!session()->is_logged) {
			//Redireccionamos
			return redirect()->route('login')->with('msg', [
                'type' => 'warning',
                'header' => '¡Ups! 😓',
                'body'=> 'Tienes que Iniciar Sesión.'
                ]);
		}

		//Llamamos al modelo de usuario
		$userModel = model('UserModel');
		//Buscamos al usuario
		$user = $userModel->getUserBy('id', session()->id);
		//Verificamos si existe
		if ($user === false) {
			//destruimos la sesión
			session()->destroy();
			//Redireccionamos
			return redirect()->route('login')->with('msg', [
                'type' => 'danger',
                'header' => '¡Ups! 😓',
                'body'=> 'El Usuario no Esta Disponible.'
                ]);
		} else {
			//Verificamos si posee el permiso
			if(in_array($user->getGroup()->name, $arguments) === false){
				//Mostramos un 404
				throw PageNotFoundException::forPageNotFound();
			}
		}
		
	}

	/**
	 * Allows After filters to inspect and modify the response
	 * object as needed. This method does not allow any way
	 * to stop execution of other after filters, short of
	 * throwing an Exception or Error.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param array|null        $arguments
	 *
	 * @return mixed
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
