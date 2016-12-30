<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book_user
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Book $book
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Book_user whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book_user whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book_user whereBookId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book_user whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book_user whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
