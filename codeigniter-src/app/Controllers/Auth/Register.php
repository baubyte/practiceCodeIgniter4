<?php

namespace App\Controllers\Auth;

/** Lamamos a BaseController */

use App\Controllers\BaseController;


/**Lamamos al la Entidad Usuario y UserInfo*/

use App\Entities\User;
use App\Entities\UserInfo;

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
        $countryModel = model('CountryModel');
        $countries = $countryModel->findAll();
        return view('auth/register', ['countries' => $countries]);
    }

    public function store()
    {

        if ($this->validationUser() === true) {
            /**Entidad Usuario */
            $user = new User($this->request->getPost());
            $user->generateUsername();
            /**Lamamos al Modelo */
            $userModel = model('UserModel');
            /**Agregamos a un grupo por defecto al usuario */
            $userModel->withGroup($this->configs->defaultGroupUsers);
            /**Entidad InfoUser */
            $userInfo = new UserInfo($this->request->getPost());
            /**Agregamos la información del Usuario */
            $userModel->addUserInfo($userInfo);
            /**Insertamos el Usuario */
            $userModel->insert($user);
            return redirect()->route('login')->with('msg', [
                'type' => 'success',
                'header' => '¡Éxito! 😬',
                'body'=> 'Te Registraste Correctamente.'
                ]);
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validationUser());
        }
    }

    /**
     * Se encarga de validar los campos del usuario
     *
     * @return boolean
     */
    public function validationUser()
    {
        //Llamamos al servicio de validación
        $validation = service('validation');
        //Seteamos las reglas
        $validation->setRules([
            'name' => [
                'label'  => 'Nombre',
                'rules'  => 'required|alpha_space|min_length[3]',
                'errors' => [
                    'required' => 'El {field} es Obligatorio.',
                    'alpha_space' => 'Solo se permiten letras.',
                    'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
                ]
            ],
            'surname' => [
                'label'  => 'Apellido',
                'rules'  => 'required|alpha_space|min_length[3]',
                'errors' => [
                    'required' => 'El {field} es Obligatorio.',
                    'alpha_space' => 'Solo se permiten letras.',
                    'min_length' => 'El {field} debe ser mayor a 3 Caracteres.',
                ]
            ],
            'email' => [
                'label'  => 'Correo Electrónico',
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'El {field} es Obligatorio.',
                    'valid_email' => 'Debe Ingresar un {field} Valido.',
                    'is_unique' => 'El {field} ya se Encuentra Registrado.',
                ]
            ],
            'country_id' => [
                'label'  => 'País',
                'rules'  => 'required|is_not_unique[countries.id]',
                'errors' => [
                    'required' => 'El {field} es Obligatorio.',
                    'is_unique' => 'El {field} no se Encuentra Registrado.',
                ]
            ],
            'password' => [
                'label'  => 'Contraseña',
                'rules'  => 'required|matches[password_confirm]|min_length[6]|regex_match[/[A-Za-z0-9]/]',
                'errors' => [
                    'required' => 'La {field} es Obligatoria.',
                    'min_length' => 'La {field} debe tener al menos 6 Caracteres.',
                    'matches' => 'Las Contraseñas no Coinciden.',
                    'regex_match' => 'La {field} debe tener Mayúsculas, Minúsculas y Números',
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
