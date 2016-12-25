@extends('layouts.app')

@section('content')

<div class="col-md-offset-4 col-md-4">
  <div class="thumbnail">
    {{Html::image($book_user->book->image, '画像がありません', ['border' => "0", 'width' => "200", 'height' => "300"])}}
    <div class="caption">
      <p class="book-info">{{ $book_user->book->title }}</p>
      <p class="book-info">{{ $book_user->book->author }}</p>
      <p class="book-info">{{ $book_user->book->publisher }}</p>
      <p class="book-info">{{ $book_user->book->publicationDate->format('Y年m月d日') }}</p>
      @foreach ($book_user->book->tags as $tag)
        <span class="label label-primary">{{ $tag->name }}</span>
      @endforeach<br><br />
      <p class="book-info">{{ $book_user->book->description }}</p>

      <p class=show-btn>
        <div style="text-align: right;">
          <div style="display:inline-flex;">
            {{ Form::open(['url' => "/book_user/$book_user->id", 'method' => 'post']) }}
            {{ method_field('DELETE') }}
                <button class="btn btn-danger">マイ本棚から削除</button>
            {{ Form::close() }}
            <a class="btn btn-default" href="/users/{{ Auth::user()->id }}">戻る</a>
          </div>
        </div>
      </p>
    </div>
  </div>
</div>


@endsection