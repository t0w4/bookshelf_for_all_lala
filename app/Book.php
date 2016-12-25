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
    protected $fillable = ['title','author','publisher','publicationDate','image','description','tag_list'];

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

    /**
     * 本を所有するユーザ
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * 本とユーザのひも付き
     */
    public function book_users()
    {
        return $this->hasMany('App\Book_user');
    }


}
