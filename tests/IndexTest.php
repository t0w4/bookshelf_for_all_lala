<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * A index function tests.
     *
     * @return void
     */
    public function testLIndex()
    {
        $this->visit('/books')
            ->see('みんなの本棚')
            ->see('ログイン')
            ->see('タイトル')
            ->see('著者名')
            ->see('タグ')
            ->dontsee('アカウント')
            ->dontsee('マイ本棚')
            ->dontsee('プロフィール編集')
            ->dontsee('ログアウト')
            ->dontSee('本を登録！')
        ;
    }
}
