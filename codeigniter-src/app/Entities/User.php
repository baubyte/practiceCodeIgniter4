<?php

namespace App\Entities;

use CodeIgniter\Entity;
use PhpParser\Node\Expr\Cast\String_;

class User extends Entity
{
    /**Mutator */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Filtro para setear el password
     *
     * @param string $password
     * @return void
     */
    protected function setPassword(string $password)
    {
        $this->attributes['password'] =  password_hash($password, PASSWORD_DEFAULT);
    }
    /**
     * Generar el Usuario con la combinación
     * del nombre y apellido
     *
     * @return void
     */
    public function generateUsername()
    {
        $this->attributes['username'] = explode(" ", $this->name)[0]. explode(" ", $this->surname)[0];
    }
    /**
     * Filtro por el cual Obtiene el Password
     *
     * @return void
     */
    protected function getPassword()
    {
        return $this->attributes['password'];
    }

    /**
     * Obtiene el grupo del usuario es decir el rol a que
     * pertenece
     *
     * @return Group
     */
    public function getGroup()
    {
        //Llamamos al modelo de grupos
        $modelGroup = model('GroupModel');
        //Buscamos el Grupo
        return $modelGroup->where('id', $this->group_id)->first();

    }

}