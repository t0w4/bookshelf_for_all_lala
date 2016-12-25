<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_user extends Model
{
    //
    protected $table = 'book_user';

    /**
     * ひも付きに該当する本を取得
     */
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    /**
     * ひも付きに該当するユーザを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
