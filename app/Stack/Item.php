<?php

namespace App\Stack;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Item
 *
 * @author EB
 * @package App\Stack
 */
class Item extends Authenticatable
{
    use Notifiable;

    /**
     * The table name which the model uses
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'revoked',
    ];

    /**
     * The attributes that are visible when serializing
     *
     * @author EB
     * @var array
     */
    protected $visible = [
        'id',
        'name',
        'description',
        'revoked',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are dates
     *
     * @author EB
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
