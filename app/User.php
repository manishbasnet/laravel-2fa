<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','google2fa_secret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','google2fa_secret',
    ];

    public function setGoogle2faSecretAtrribute($value)
    {
        $this->attributes['google2fa_secret'] = encrypt($value);
    }
    public function getGoogle2faSecretAtrribute($value)
    {
        return decrypt($value);
    }
}
