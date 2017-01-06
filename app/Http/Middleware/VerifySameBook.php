<?php

namespace App\Http\Middleware;

use Closure;
use App\Book;

class VerifySameBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //同名の本が登録されている場合、本の画面に戻す(本の新規登録時のみ)
        $book_title_input = trim($request->input('book.title'));
        if (Book::whereTitle($book_title_input)->count() != 0 ) {
            $request->flash();
            return back()->with('message','同名の本がすでに登録されています。');
        }

        return $next($request);
    }
}
