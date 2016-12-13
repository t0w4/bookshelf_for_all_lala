@extends('layouts.app')

@section('content')

    <div class="container theme-showcase">

      <div class="form-group">

        <ul class="nav nav-pills">
          <li class="active"><a href="#" class="title">タイトル</a></li>
          <li><a href="#" class="author" >著者名</a></li>
          <li><a href="#" class="tag">タグ</a></li>
        </ul>

        {{ Form::open(['url' => '/books/search', 'method' => 'get']) }}
          <div class="input-group">
            <input type="hidden" name="searchtype" value="title" class="search-type" />
            <input type="text" placeholder="本を検索" name="keyword" value="" class="form-control" />
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit">検索</button>
            </span>
          </div>
        {{ Form::close() }}

    </div>

  </div> <!-- /container -->

    <hr>

    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <h4>
          <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
          検索結果
        </h4>
        <hr>

        <div class="row">
          @foreach ($books as $book)
            @include('books.book', ['book' => $book])
          @endforeach
        </div>

        <div style='text-align:center;'>
          {{ $books->render() }}
        </div>

      </div>
    </div>

@endsection