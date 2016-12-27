<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use DB;
use Auth;
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
          //検索キーワードを含むタグのIDを抽出
          $tags  = Tag::where('name', 'LIKE', "%$request->keyword%")->get();
          $tag_id_array = array();
          foreach ($tags as $tag){
                $tag_id_array[] = $tag->id;
          }

          //検索キーワードを含むタグがついている本のIDを取得
          $book_id_collections = DB::table('book_tag')->whereIn('tag_id', $tag_id_array)->select('book_id')->distinct()->get();

          $book_ids = $book_id_collections->map(function ($item, $key) {
            return $item->book_id;
          });

          $books = Book::whereIn('id', $book_ids)->orderBy('created_at','desc')->paginate(12);

          return view('books.search', ['books' => $books,
                                     'keyword' => $request->keyword,
                                     'searchtype' => $request->searchtype]);

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

        //本を登録
        $book = Book::create([
                    'title'           => $request->input('book.title'),
                    'author'          => $request->input('book.author'),
                    'publisher'       => $request->input('book.publisher'),
                    'publicationDate' => Carbon::createFromFormat('Y/m/d', $request->input('book.publicationDate'))->format('Y-m-d'),
                    'image'           => $request->input('book.image'),
                    'description'     => $request->input('book.description')
                ]);

        //本を登録したユーザの本棚にも登録
          DB::table('book_user')->insert(
              ['user_id'    => Auth::user()->id,
               'book_id'    => $book->id,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
               ]
          );


        /*  登録されているタグか確認し、登録されていないなら登録する。
            その後タグ名からidを取得し本とタグのリレーションを設定する。
        */
        $tag_name_array = explode(",", $request->input('book.tag_list'));

        if (!empty($tag_name_array[0])){
            $tag_id_array = array();
            foreach ($tag_name_array as $tag_name){
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $tag_id_array[] = $tag->id;
            }
            $book->tags()->sync($tag_id_array);
        }

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
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
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
        $this->validate($request, [
            'book.title' => 'required',
            'book.author' => 'required',
            'book.publicationDate' => ['required','date_format:"Y/m/d"']
        ]);

        $book = Book::find($id);

        $book->title           = $request->input('book.title');
        $book->author          = $request->input('book.author');
        $book->publisher       = $request->input('book.publisher');
        $book->publicationDate = Carbon::createFromFormat('Y/m/d', $request->input('book.publicationDate'))->format('Y-m-d');
        $book->image           = $request->input('book.image');
        $book->description     = $request->input('book.description');

        $book->save();

        /*  登録されているタグか確認し、登録されていないなら登録する。
            その後タグ名からidを取得し本とタグのリレーションを設定する。
        */
        $tag_name_array = explode(",", $request->input('book.tag_list'));

        if (!empty($tag_name_array[0])){
            $tag_id_array = array();
            foreach ($tag_name_array as $tag_name){
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $tag_id_array[] = $tag->id;
            }
            $book->tags()->sync($tag_id_array);
        }

        return view('books.show', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return view('books.destroy');
    }
}
