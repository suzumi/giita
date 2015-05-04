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
	public static function getSnippets($id, $count = 5)
	{
		return \DB::table('users')
			->leftjoin('snippets', 'users.id', '=', 'snippets.user_id')
			->where('snippets.user_id', '=', $id)
			->orderBy('snippets.created_at', 'desc')
			->take($count)
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

	/**
	 * ストックする
	 * @param array $params
	 */
	public static function postStock($params)
	{
		\DB::transaction(function() use($params){
			\DB::table('stocks')
				->insert([
                    'user_id' => $params['userId'],
                    'snippet_id' => $params['snippetId'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
		});

	}

    /**
     * アンストックする
     * @param $params
     */
	public static function deleteStock($params)
	{
		\DB::transaction(function() use($params){
			\DB::table('stocks')
				->where('user_id', '=', $params['userId'])
				->where('snippet_id', '=', $params['snippetId'])
				->delete();
		});
	}

    /**
     * ストックしてるかの存在チェック(true|false)
     * @param $userId
     * @param $snippetId
     * @return mixed
     */
    public static function isStocked($userId, $snippetId)
    {
        // asに``をつけること
        $query = <<< SQL
select
    exists(
        select
            1
        from
            stocks
        where
            user_id = $userId
        and snippet_id = $snippetId
    ) as `exists`
SQL;

        return \DB::selectOne($query);
    }

    /**
     * ストックしたスニペットリスト
     * @param $id
     * @return mixed
     */
    public static function myStocks($id)
    {
        return \DB::table('snippets')
            ->leftjoin('stocks', 'snippets.id', '=', 'stocks.snippet_id')
            ->leftjoin('users', 'snippets.user_id', '=', 'users.id')
            ->where('stocks.user_id', '=', $id)
            ->orderBy('stocks.created_at', 'desc')
            ->select([
                '*',
                'users.id as user_id',
                'snippets.created_at as snippet_created_at',
            ])
            ->get();
    }
}
