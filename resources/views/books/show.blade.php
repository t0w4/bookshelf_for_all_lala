@extends('layouts.app')

@section('content')

<div class="col-md-offset-4 col-md-4">
  <div class="thumbnail">
    {{Html::image($book->image, '画像がありません', ['border' => "0", 'width' => "200", 'height' => "300"])}}
    <div class="caption">
      <p class="book-info">{{ $book->title }}</p>
      <p class="book-info">{{ $book->author }}</p>
      <p class="book-info">{{ $book->publisher }}</p>
      <p class="book-info">{{ $book->publicationDate->format('Y年m月d日') }}</p>
      @foreach ($book->tags as $tag)
        <span class="label label-primary">{{ $tag->name }}</span>
      @endforeach<br><br />

      <p class="book-info">{{ $book->description }}</p>

      <p class=show-btn>
        @if (Auth::check())

          <div style="text-align: right;">
            {{ Form::open(['url' => "/book_user/add", 'method' => 'post']) }}
              <input type="hidden" name="book_id" id="book_id" value="{{$book->id}}">
              <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
              <button type="button" class="btn btn-success" onclick="submit();">マイ本棚に登録</button>
            {{ Form::close() }}<br />

            <div style="display:inline-flex;">
              <a href="/books/{{ $book->id }}/edit" class="btn btn-primary" role="button">編集</a>
              <a href="/" class="btn btn-default" role="button">戻る</a>
              {{ Form::open(['url' => "/books/$book->id", 'method' => 'post']) }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">削除</button>
              {{ Form::close() }}
            </div>
          </div>
        @else
          <a href="/" class="btn btn-primary" role="button">戻る</a>
        @endif
      </p>
    </div>
  </div>
</div>


@endsection