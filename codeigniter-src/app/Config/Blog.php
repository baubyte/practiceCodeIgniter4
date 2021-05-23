<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Blog extends BaseConfig
{
	/**
 	 * Propiedad de configuración que determina un 
	 * grupo por defecto para cada usuario nuevo que crea
	 * @var string
	 */
	public $defaultGroupUsers = 'User';
	/**
	 * Propiedad de configuración que determina la cantidad
	 * de registros que se mostraran por pagina
	 *
	 * @var integer
	 */
	public $regPerPage = 2;

}
