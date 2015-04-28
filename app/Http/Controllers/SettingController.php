<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Snippet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * アカウント編集ページ
     * @return $this
     */
    public function account()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.edit')->with(compact('user'));
    }

    public function accountUpdate(Request $request)
    {
//        dd($request->all());
        if(Input::hasFile('profile-icon')) {
            $image = Input::file('profile-icon');
            $name = md5(sha1(uniqid(mt_rand(), true))). '.'. $image->getClientOriginalExtension();
            $upload = $image->move('media', $name);

            Image::make('media/'.$name)
                ->resize(60, 60)
                ->save('media/mini/'.$name);
        } else {
            dd('ファイルがアップロードされていません');
        }
    }
}
