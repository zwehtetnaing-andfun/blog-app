<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles/index',["articles"=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        session()->flash('success','New Article Created');
        return to_route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        return view('articles/edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        session()->flash('success','Article Updated');
        return to_route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        session()->flash('success','Article Deleted');
        return back();
    }
}
