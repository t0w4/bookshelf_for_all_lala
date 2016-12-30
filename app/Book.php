<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $publisher
 * @property string $isbn
 * @property \Carbon\Carbon $publicationDate
 * @property string $image
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Book_user[] $book_users
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereAuthor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePublisher($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereIsbn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePublicationDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
