<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }


    public function index(){

        
        // $articles=Article::all();

        //paginate:頁數功能
        $articles=Article::with('user')->orderBy('id','desc')->paginate(2);
        // $articles=Article::paginate(1);

        return view('articles.index',['articles'=>$articles]);
    }

    public function show($id){
        $article=Article::find($id);
        return view('articles.show',['article'=>$article]);
    }


    public function create(){
        return view('articles.create');
    }



    public function store(Request $request){
        
        // if(Auth::check()) 檢查登入

        $content=$request->validate([
            'title' => ['required'],
            'content' => ['required','min:10']
        ]);
        auth()->user()->articles()->create($content);
        // // return redirect("/");
        return redirect()->route('root')->with("notice","新增成功");

    }

    public function edit($id){
        // $article=Article::where();

        $article=auth()->user()->articles->find($id);
        return view('articles.edit' ,['article'=>$article]);

    }


    public function update(Request $request,$id){
        $article=auth()->user()->articles->find($id);
        $content=$request->validate([
            'title' => ['required'],
            'content' => ['required','min:10']
        ]);
        $article->update($content);
        return redirect()->route('root')->with("notice","更新成功");

    }


    public function destroy($id){
        $article=auth()->user()->articles->find($id);
        $article->delete();
        return redirect()->route('root')->with('notice','文章刪除');
    }


}
