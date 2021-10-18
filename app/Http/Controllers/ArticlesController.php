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
        $this->middleware('auth')->except('index');
    }


    public function index(){
        $articles=Article::all();
        return view('articles.index',['articles'=>$articles]);
    }
    public function create(){
        return view('articles.create');
    }


    public function store2(Request $request) {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);

        auth()->user()->articles()->create($content);
        return redirect()->route('root')->with('notice', '文章新增成功！');
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

}
