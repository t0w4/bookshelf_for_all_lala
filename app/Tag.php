<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * タグが付いている本
     */
    public function books()
    {
        return $this->belongsToMany('App\Book')->withTimestamps();;
    }
}
