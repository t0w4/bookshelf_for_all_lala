<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * Top画面に必ず表示される文字を確認(未ログイン).
     *
     * @return void
     */
    public function testLConstWords()
    {
        $books = factory(App\Book::class, 10)->create();

        $this->visit('/books')
            ->see('みんなの本棚')
            ->see('ログイン')
            ->see('タイトル')
            ->see('著者名')
            ->see('タグ')
            ->see('本を検索')
            ->see('検索')
            ->see('新着本')
            ->dontsee('アカウント')
            ->dontsee('マイ本棚')
            ->dontsee('プロフィール編集')
            ->dontsee('ログアウト')
            ->dontSee('本を登録！')
        ;

        foreach ($books as $book) {
            $this->visit('/books')
                 ->see(str_limit($book->title, 20))
                 ->see(str_limit($book->author, 20))
                 ->dontSee($book->publisher)
                 ->dontSee($book->isbn)
                 ->dontSee($book->publicationDate)
                 ->see($book->image)
                 ->dontSee($book->description)
            ;
        }
    }
}
