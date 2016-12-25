<?php

namespace App\Http\Controllers;

use DB;
use Auth;
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
        $book_user = DB::table('book_user')->find($id);
        return view('books.show', ['book' => $book]);
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

  //   def show
  //     @user_book = UserBook.find(params[:id])
  //     @book = @user_book.book
  //   end

  //   def destroy
  //     @user_book = UserBook.find(params[:id])
  //     @user_book.destroy

  //     redirect_to controller: 'users', action: 'show', id: current_user.id
  //   end

}
