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
          @foreach ($book_users as $book_user)
            @include('book_user.book', ['book_user' => $book_user])
          @endforeach

        </div>
        <div style='text-align:center;'>
          {{ $book_users->render() }}
        </div>

      </div>
    </div>

@endsection