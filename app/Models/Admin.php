<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $fillable = ['login', 'password'];

    public $timestamps = false;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

}
