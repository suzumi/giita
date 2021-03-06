<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

class MailController extends Controller
{

    const GUEST_USER = 'ゲストユーザー';
    private $userName;

    public function __construct()
    {
        if(\Auth::check()) {
            $this->userName = \Auth::user()->name;
        } else {
            $this->userName = self::GUEST_USER;
        }

    }

    /**
     * フィードバックを送信する
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function feedback(Request $request)
    {
        $input = $request->all();
        if(empty($input['feedback-form'])) {
            \Session::flash('feedbackError', '必ずフォームの内容を入力してください。');
            return redirect()->back();
        }

        \Mail::send('emails.feedback', ['name' => $this->userName, 'body' => $input['feedback-form']], function($message) {
            $message->to('shibue@gizumo-inc.jp')->cc('arata@gizumo-inc.jp')->subject("【Giita】{$this->userName}さんからのお問い合わせ【フィードバック】");
        });

        \Session::flash('feedbackSuccess', 'お問い合わせを送信しました。ありがとうございます。');
        return redirect()->back();
    }

}