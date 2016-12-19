@extends('layouts.app')

@section('content')

<div class="col-md-offset-4 col-md-4">
  <div class="thumbnail">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error-message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Html::image($book->image, '画像がありません', ['border' => "0", 'width' => "200", 'height' => "300"])}}


    {{ Form::open(['url' => "books/$book->id", 'method' => 'PUT']) }}
      <div class="form-group">
        <label class="control-label" for="focusedInput_title">作品名</label>
        <input class="form-control" id="focusedInput_title" type="text" value="{{$book->title}}" name="book[title]">
      </div>
      <div class="form-group">
        <label class="control-label" for="focusedInput_author">著者</label>
        <input class="form-control" id="focusedInput_author" type="text" value="{{$book->author}}" name="book[author]">
      </div>
      <div class="form-group">
        <label class="control-label" for="focusedInput_publisher">出版社</label>
        <input class="form-control" id="focusedInput_publisher" type="text" value="{{$book->publisher}}" name="book[publisher]">
      </div>
      <div class="form-group">
        <label class="control-label" for="focusedInput_publicationDate">出版日(年/月/日)</label>
        <input class="form-control" id="focusedInput_publicationDate" type="text" value="{{ $book->publicationDate->format('Y/m/d') }}" name="book[publicationDate]">
      </div>
      <div class="form-group">
        <label class="control-label" for="focusedInput_image">画像URL</label>
        <input class="form-control" id="focusedInput_image" type="text" value="{{$book->image}}" name="book[image]">
      </div>

      <div class="form-group">
      <label class="control-label" for="focusedInput_tags">タグ(入力後Enter)</label><br />
        <input type="text" name="book[tag_list]" id="focusedInput_tags"
          value="<?php
                  $tag_name_array = array();
                  foreach ($book->tags as $tag){
                    $tag_name_array[] = $tag->name;
                  }
                  echo implode(",", $tag_name_array);
                 ?>"
          class="form-control" data-role="tagsinput" style="display: none;">
      </div>

      <div class="form-group">
        <label class="control-label" for="focusedInput_description">本の概要</label>
        <textarea class="form-control" id="focusedInput_description" name="book[description]">{{$book->description}}</textarea>
      </div>

      <p class=show-btn>
        <button type="button" class="btn btn-primary" onclick="submit();">投稿する</button>
        <a href="/" class="btn btn-default" role="button">戻る</a>
      </p>
    {{ Form::close() }}
  </div>
</div>

@endsection<