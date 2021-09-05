<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'article_status';

    /**
     * @var integer
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'label',
    ];

    public $timestamps=false;

}
