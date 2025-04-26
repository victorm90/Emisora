<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password', // Si manejas actualización de contraseña
        'image', // Añadir este campo
        'status',
    ];
}

