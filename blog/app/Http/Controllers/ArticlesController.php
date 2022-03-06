<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::latest()->simplePaginate(3);
        return view('articles.articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   
        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content; 
        $article->user_id = auth()->id();
        $article->views = 0;
        $article->save();     
        
        

        $hasFile = $request->hasFile('pic') && $request->pic->isValid();

        if($hasFile){
            $extension = $request->pic->extension();
            $request->pic->storeAs('images',$article->id.".".$extension);
        }

        return view('articles.save',['id'=>$article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $article->views = $article->views +1;
        $user = User::find($article->user_id);
    
        $article->save(); 

        

        return view('articles.show',['article'=>$article,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $article = Article::find($id);
        return view('articles.edit',["article"=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input("title");
        $article->content = $request->input("content");

        $article->save();
        return view('articles.updated',['article'=>$article]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        redirect().route('articles.index');


    }
}
