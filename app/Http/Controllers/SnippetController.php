<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Snippet;
use Illuminate\Http\Request;

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
        if($isWeeklyReport) {
            return view('snippet/create')->with(compact('isWeeklyReport', 'template'));
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
        $this->snippet->fill($input);
        $this->snippet->save();

        return redirect()->to('/');
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
        $markdown = $parser->parse($snippet->body);
        $snippet['body'] = $markdown;
        return view('snippet.show')->with(compact('snippet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
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

## 取組中の課題
---

## 使用したリソース
---

## 作業完了までの見積値と実績値
---

## 現場で取り組んでいる内容
---

## 個人的に学習している内容
---

## 所感
---
EOS;

        return redirect()->to('/snippet/create')->with(compact('isWeeklyReport', 'template'));
    }

}
