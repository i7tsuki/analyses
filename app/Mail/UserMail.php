<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;
    
    
    // 引数で受け取る変数
    protected $content;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // コンストラクタ設定
    public function __construct($email)
    {
        // 引数で受け取ったデータを変数にセット
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this
          ->from('hoge@exapmle.com') // 送信元
          ->subject('テスト送信') // メールタイトル
          ->view('mail.send') // メール本文のテンプレート
          ->with(['email' => $this->email]);  // withでセットしたデータをviewへ渡す
    }
}
