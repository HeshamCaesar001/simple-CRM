<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_ADMIN = 1;
    const ROLE_TMLD = 2;
    const ROLE_SAL = 3;
    protected $fillable = ['title','slug'];
}
