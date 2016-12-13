<?php

namespace App\Http\Controllers;

use App\Article;

use App\Tag;

use App\Http\Requests;

use Carbon\Carbon;

use App\Http\Requests\ArticleRequest;

use Illuminate\Http\Request;

use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index() 
    {
        $articles = Article::latest('published_at')->published()->get();
        $latest = Article::latest()->first();
    	return view('articles.index',compact('articles','latest'));
    }
    public function show(Article $article)
    {
    	return view('articles.show',compact('article'));
    }

    public function create() 
    {
        $tags = Tag::pluck('name', 'id');
    	return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request) 
    {    
        $this->createArticle($request);	        
           	
        flash()->overlay('Your article has been successfully created', 'Good Job');

    	return redirect('articles');
    }

    public function edit(Article $article)
    {
    	$tags = Tag::pluck('name', 'id');
    	return view('articles.edit',compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
    	
    	$article->update($request->all());
    	
        $this->syncTags($article, $request->input('tag_list'));
        
    	return redirect('articles');
    }

    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());  

        $this->syncTags($article, $request->input('tag_list'));
    
        return $article;
    }
}
