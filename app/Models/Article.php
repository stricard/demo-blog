<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'contents' => 'string',
        'user_id' => 'integer',
        'status_id' => 'integer',
        'publicated_at' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'title',
        'contents',
        'publicated_at',
        'created_at',
        'updated_at',
        'user_id',
        'status_id'
    ];

}
