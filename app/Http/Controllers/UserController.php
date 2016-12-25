<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #ログインユーザのIDとページのユーザIDが一致しているなら表示
        if (Auth::user()->id == $id){
          $user_books = Auth::user()->book_users()->orderBy('created_at','desc')->paginate(12);

          return view('users.show', ['user_books' => $user_books]);

        }else{
          return redirect('/');
        }

    }


}
