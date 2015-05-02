<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Snippet;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnippetController extends Controller
{

    private $snippet;

    public function __construct(Snippet $snippet)
    {
        $this->snippet = $snippet;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $snippets = $this->snippet->all();
        return view('home')->with(compact('snippets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $isWeeklyReport = \Session::get('isWeeklyReport');
        $template = \Session::get('template');
        $oneBeforeSnippetRow = User::getSnippets(Auth::user()->id, 1);
        if (!empty($oneBeforeSnippetRow)) {
            $parser = new \cebe\markdown\GithubMarkdown();
            $oneBeforeSnippet = $parser->parse($oneBeforeSnippetRow[0]->body);
        }
        if($isWeeklyReport) {
            return view('snippet/create')->with(compact('isWeeklyReport', 'template', 'oneBeforeSnippet'));
        }
        return view('snippet/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
        $input['user_id'] = Auth::user()->id;
        $this->snippet->fill($input);
        $this->snippet->save();
        // スニペットにタグを紐付ける
        $snippet = Snippet::find($this->snippet->id);
        $snippet->tags()->attach($input['selected-tags']);

        return redirect()->to("/snippet/{$this->snippet->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $parser = new \cebe\markdown\GithubMarkdown();

        $snippet = $this->snippet->find($id);
        $comments = Comment::commentList($id);

        $parsedComment = array_map(function($comment) use($parser) {
            $comment->comment = $parser->parse($comment->comment);
            return $comment;
        }, $comments);

        $markdown = $parser->parse($snippet->body);
        $snippet['body'] = $markdown;
        return view('snippet.show')->with(compact('snippet','parsedComment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $snippet = $this->snippet->find($id);
        return view('snippet.edit')->with(compact('snippet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->snippet->where('id', $id)->update(['title' => $input['title'], 'body' => $input['body']]);
        // スニペットにタグを紐付ける
        $snippet = Snippet::find($id);
        $snippet->tags()->detach();
        $snippet->tags()->attach($input['selected-tags']);

        return redirect()->to("/snippet/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = $this->snippet->find($id);
        $data->delete();

        return redirect()->to('/');
    }

    /**
     * 「週報」リンクから遷移してきたときにパラメータを渡すためリダイレクトする
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function weeklyReportTemplate()
    {
        $isWeeklyReport = true;
        $template = <<< EOS

### 取組中の課題
---

### 使用したリソース
---

### 作業完了までの見積値と実績値
---

### 現場で取り組んでいる内容
---

### 個人的に学習している内容
---

### 所感
---
EOS;

        return redirect()->to('/snippet/create')->with(compact('isWeeklyReport', 'template'));
    }

    public function mypage()
    {
        return view('auth.mypage');
    }
}
