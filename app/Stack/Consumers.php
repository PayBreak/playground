<?php

namespace App\Stack;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Consumers extends Authenticatable
{
    use Notifiable;

    /**
     * The table name which the model uses
     *
     * @var string
     */
    protected $table = 'consumers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'date_of_birth',
        'email',
        'password',
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
     * The attributes that are datse
     *
     * @author EB
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
