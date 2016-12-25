<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Book_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

class Book_userController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book_user = Book_user::find($id);
        return view('book_user.show', ['book_user' => $book_user]);
    }

    /**
     * Add book to the user's bookshelf.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        #ログインユーザのIDとリクエストのユーザIDが一致しているなら追加
        if (Auth::user()->id == $request->input('user_id')){
          DB::table('book_user')->insert(
              ['user_id'    => $request->input('user_id'),
               'book_id'    => $request->input('book_id'),
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
               ]
          );
          return redirect()->route('users.show', ['id' => $request->input('user_id')]);

        }else{
          return redirect('/');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #ログインユーザのIDとBook_userのユーザIDが一致するなら削除
        if (Auth::user()->id == Book_user::find($id)->user_id){
          Book_user::destroy($id);
          return redirect()->route('users.show', ['id' => Auth::user()->id]);
        }else{
          return redirect()->route('users.show', ['id' => Auth::user()->id]);
        }
    }

}
