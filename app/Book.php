<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = ['title','author','publisher','publicationDate','image','description'];

    /**
     * Dateタイプへキャストする属性
     *
     * @var array
     */
    protected $casts = [
        'publicationDate' => 'date',
    ];

    /**
     * 本についているタグ
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
