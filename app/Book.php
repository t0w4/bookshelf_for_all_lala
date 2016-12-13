<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Dateタイプへキャストする属性
     *
     * @var array
     */
    protected $casts = [
        'publicationDate' => 'date',
    ];
}
