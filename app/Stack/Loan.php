<?php

namespace App\Stack;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Loan extends Authenticatable
{
    use Notifiable;

    /**
     * The table name which the model uses
     *
     * @var string
     */
    protected $table = 'loan';

    protected $primaryKey = 'account_number';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_number',
        'user',
        'nickname',
        'merchant_tx',
        'active',
        'default_date',
        'settled',
        'cancelled',
    ];

    /**
     * The attributes that are visible when serializing
     *
     * @author EB
     * @var array
     */
    protected $visible = [
        'account_number',
        'user',
        'nickname',
        'merchant_tx',
        'active',
//        'default_date',
        'settled',
        'cancelled',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

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
