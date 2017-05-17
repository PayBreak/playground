<?php

namespace App\Stack;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Consumer extends Authenticatable
{
    use Notifiable;

    /**
     * The table name which the model uses
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'dob',
        'email',
        'password',
    ];

    /**
     * The attributes that are visible when serializing
     *
     * @author EB
     * @var array
     */
    protected $visible = [
        'id',
        'title',
        'first_name',
        'last_name',
        'dob',
        'email',
//        'created_at',
//        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are dates
     *
     * @author EB
     * @var array
     */
//    protected $dates = [
//        'created_at',
//        'updated_at',
//    ];
}
