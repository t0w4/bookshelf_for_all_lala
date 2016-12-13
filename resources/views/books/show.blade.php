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
<!--       <% @book.tag_list.each do |tag| %>
        <span class="label label-primary"><%= tag %></span>
      <% end %><br></br> -->
      <p class="book-info">{{ $book->description }}</p>

      <p class=show-btn>
<!--         <% if user_signed_in? %> -->
<!--           <%= form_tag(add_user_books_path, :method => :post) do %>
            <%= hidden_field_tag("book_id", @book.id) %>
            <%= hidden_field_tag("user_id", current_user.id) %>
            <button type="button" class="btn btn-success" onclick="submit();">マイ本棚に登録</button>
          <% end %><br /> -->

          <a href="/books/{{ $book->id }}/edit" class="btn btn-primary" role="button">編集</a>
          <a href="/" class="btn btn-default" role="button">戻る</a>
          <a href="/books/{{ $book->id }}" class="btn btn-danger" method="delete" role="button">削除</a>
<!--         <% else %>
          <a href="/" class="btn btn-primary" role="button">戻る</a>
        <% end %> -->
      </p>
    </div>
  </div>
</div>


@endsection