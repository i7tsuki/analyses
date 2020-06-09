<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App;


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
        
        if (\Auth::check()) {
            
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            $current_url = url()->current();    //現在のURL
            $mail_change_token = uniqid(bin2hex(random_bytes(1))) ; //トークン（乱数）
            
            // トークンを保存する
            $user->mail_change_token = $mail_change_token;
            $user->save();
            
            
            return $this
                    ->from('hoge@exapmle.com') // 送信元
                    ->subject('テスト送信') // メールタイトル
                    ->view('mail.send') // メール本文のテンプレート
                    ->with([
                        'id' => $user->id, 
                        'new_email' => $this->email, 
                        'old_email' => $user->email,
                        'mail_change_token' => $mail_change_token,
                        'current_url' => $current_url,
                    ]);
            
            
        } else {
            return redirect('/');
        }
    }
}
