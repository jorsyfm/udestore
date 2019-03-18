<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    // Constantes para tipos de usuarios
    const ADMIN = 1;
    const TEACHER = 2;
    const STUDENT = 3;
}
