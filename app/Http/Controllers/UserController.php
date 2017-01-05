<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Hash;
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

    /**
     * edit user's info.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #ログインユーザのIDとページのユーザIDが一致しているなら表示
        if (Auth::user()->id == $id){
          $user = User::find(Auth::user()->id);
          return view('users.edit', ['user' => $user]);

        }else{
          return redirect('/');
        }

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'new_password' => 'required|min:6'
        ]);

        $user = User::find($id);

        $user->name           = $request->input('name');
        $user->email          = $request->input('email');

        if(Hash::check($request->input('password'),$user->password)){
            $user->password   = Hash::make($request->input('new_password'));
            $user->save();
            return redirect('/');
        }else{
            return back()->withInput()->with('message', '現在のパスワードと一致しません。');;
        }

    }

}
