<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at','desc')->paginate(12);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Display a result of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        switch ($request->searchtype){
        case 'title':
          $books = Book::where('title', 'LIKE', "%$request->keyword%")->orderBy('created_at','desc')->paginate(12);
          return view('books.search', ['books' => $books]);
          break;
        case 'author':
          $books = Book::where('author', 'LIKE', "%$request->keyword%")->orderBy('created_at','desc')->paginate(12);
          return view('books.search', ['books' => $books]);
          break;
        case 'tag':
          // @books = Book.search(:title_cont => "#{params[:keyword]}").result.page(params[:page]).per(12).order("created_at DESC")
          break;
        default:
          $books = Book::orderBy('created_at','desc')->paginate(12);
          return view('books.search', ['books' => $books]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'book.title' => 'required',
            'book.author' => 'required',
            'book.publicationDate' => ['required','date_format:"Y/m/d"']
        ]);

        Book::create([
            'title'           => $request->input('book.title'),
            'author'          => $request->input('book.author'),
            'publisher'       => $request->input('book.publisher'),
            'publicationDate' => Carbon::createFromFormat('Y/m/d', $request->input('book.publicationDate'))->format('Y-m-d'),
            'image'           => $request->input('book.image'),
            'description'     => $request->input('book.description')
        ]);

        return view('books.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}