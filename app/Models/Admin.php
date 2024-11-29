<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{

    protected  $table = 'Admins' ;
    use HasFactory;


    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'permissions'

    ];


}
