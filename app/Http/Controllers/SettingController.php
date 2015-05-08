<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Snippet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->userId = Auth::user()->id;
        $this->user = User::find($this->userId);
        $this->middleware('auth');
    }

    /**
     * アカウント編集ページ
     * @return $this
     */
    public function account()
    {
//        $user = User::find($this->userId);
        return view('auth.edit')->with(['user' => $this->user]);
    }

    /**
     * アカウント編集更新
     * @param Request $request
     * @return mixed
     */
    public function accountUpdate(Request $request)
    {
        $input = $request->all();
        $updateSet = [
            'github' => $input['github'],
            'twitter' => $input['twitter']
        ];

        if(Input::hasFile('profile-icon')) {
            $image = Input::file('profile-icon');
            $name = md5(sha1(uniqid(mt_rand(), true))). '.'. $image->getClientOriginalExtension();
            $upload = $image->move('media', $name);
            File::delete(public_path($this->user->thumbnail));
            $updateSet['thumbnail'] = $upload;
        }

        User::where('id', $this->userId)->update($updateSet);

        Session::flash('success', 'プロフィールを編集しました');

        return Redirect::to("/settings/account");
    }
}
