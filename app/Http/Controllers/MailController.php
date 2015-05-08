<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;

class MailController extends Controller
{

    private $userName;

    public function __construct()
    {
        $this->userName = \Auth::user()->name;
    }

    /**
     * フィードバックを送信する
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function feedback(Request $request)
    {
        $input = $request->all();

        \Mail::send('emails.feedback', ['name' => $this->userName, 'body' => $input['feedback-form']], function($message) {
            $message->to('shibue@blue-corporation.jp')->cc('arata@blue-corporation.jp')->subject("【Biita】{$this->userName}さんからのお問い合わせ【フィードバック】");
        });

        \Session::flash('feedbackSuccess', 'お問い合わせを送信しました。ありがとうございます。');
        return redirect()->back();
    }

}