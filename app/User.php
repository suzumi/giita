<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function snippets() {
		return $this->hasMany('App\Snippet', 'id');
	}

	/**
	 * 自分の投稿したスニペットを取得
	 * @param $id
	 * @return mixed
	 */
	public static function getSnippets($id)
	{
		return \DB::table('users')
			->leftjoin('snippets', 'users.id', '=', 'snippets.user_id')
			->where('snippets.user_id', '=', $id)
			->orderBy('snippets.created_at', 'desc')
			->take(5)
			->get();
	}

	/**
	 * スニペットアクティビティを取得
	 * @param $id
	 */
	public static function getSnippetActivity($id)
	{
		$query = <<< SQL
select
    DATE_FORMAT(snippets.created_at, '%Y-%c-%d') as date,
    count(snippets.created_at) as value
from
    users
    left join
        snippets
    on  users.id = snippets.user_id
where
    snippets.user_id = $id
group by
    DATE_FORMAT(snippets.created_at, '%Y-%m-%d')
order by
    snippets.`created_at` DESC
SQL;
		return \DB::select(\DB::raw($query));
	}

	/**
	 * 自分の投稿した人気のあるスニペットを取得
	 * @param $is
	 * @return mixed
	 */
	public static function getMyPopularSnippets($id)
	{
		//
	}
}
