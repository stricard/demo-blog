<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var integer
     */
    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at'
    ];


}
