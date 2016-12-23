@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <h4>
          <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
          マイ本棚
        </h4>
        <hr>

        <div class="row">
          @foreach ($user_books as $book)
            @include('books.book', ['book' => $book])
          @endforeach

        </div>
        <div style='text-align:center;'>
          {{ $user_books->render() }}
        </div>

      </div>
    </div>

@endsection