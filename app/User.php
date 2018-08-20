<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Nicolaslopezj\Searchable\SearchableTrait;
class User extends Authenticatable
{
    
    use Notifiable;
     use SearchableTrait;

       protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.email' => 5,
            'users.id' => 3,
        ]
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function lists()
    {
        return $this->hasMany(List_products::class);
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
