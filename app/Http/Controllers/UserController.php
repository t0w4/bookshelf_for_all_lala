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
          $book_users = Auth::user()->book_users()->orderBy('created_at','desc')->paginate(12);

          return view('users.show', ['book_users' => $book_users]);

        }else{
          return redirect('/');
        }

    }


}
