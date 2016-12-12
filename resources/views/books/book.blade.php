            <div class="col-sm-4 col-md-3">
              <div class="thumbnail">
                <div class="imag-tag">
                  <a href="books/{{$book->id}}">
                    {{Html::image($book->image, '画像がありません', ['border' => "0", 'width' => "175", 'height' => "300"])}}
                  </a>
                </div>
                <div class="caption">
                  <a href="books/{{$book->id}}" class="book-info">{{str_limit($book->title, 20)}}</a>
                  <div class="book-info">{{str_limit($book->author, 20)}}</div>
<!--                   <% book.tag_list.each do |tag| %>
                    <span class="label label-primary"><%= tag %></span>
                  <% end %><br></br>
 -->            </div>
              </div>
            </div>