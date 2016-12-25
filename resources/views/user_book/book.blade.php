            <div class="col-sm-4 col-md-3">
              <div class="thumbnail">
                <div class="imag-tag">
                  <a href="/books/{{$user_book->id}}">
                    {{Html::image($user_book->book->image, '画像がありません', ['border' => "0", 'width' => "175", 'height' => "300"])}}
                  </a>
                </div>
                <div class="caption">
                  <a href="books/{{$user_book->id}}" class="book-info">{{str_limit($user_book->book->title, 20)}}</a>
                  <div class="book-info">{{str_limit($user_book->book->author, 20)}}</div>
                    @foreach ($user_book->book->tags as $tag)
                      <span class="label label-primary">{{ $tag->name }}</span>
                    @endforeach
                    </div>
                </div>
              </div>