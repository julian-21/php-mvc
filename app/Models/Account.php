<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
   
    protected $table = 'accounts';

    
    protected $primaryKey = 'username';

    public $incrementing = false;

    protected $keyType = 'string';


    protected $fillable = ['username', 'password', 'name', 'role'];

    protected $hidden = ['password', 'remember_token'];
}
