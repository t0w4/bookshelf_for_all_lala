            <div class="col-sm-4 col-md-3">
              <div class="thumbnail">
                <div class="imag-tag">
                  <a href="/book_user/{{$book_user->id}}">
                    {{Html::image($book_user->book->image, '画像がありません', ['border' => "0", 'width' => "175", 'height' => "300"])}}
                  </a>
                </div>
                <div class="caption">
                  <a href="/book_user/{{$book_user->id}}" class="book-info">{{str_limit($book_user->book->title, 20)}}</a>
                  <div class="book-info">{{str_limit($book_user->book->author, 20)}}</div>
                    @foreach ($book_user->book->tags as $tag)
                      <span class="label label-primary">{{ $tag->name }}</span>
                    @endforeach
                    </div>
                </div>
              </div>