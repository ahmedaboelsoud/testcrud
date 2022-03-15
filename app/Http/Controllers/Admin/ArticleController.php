<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->paginate(10);
        return view('article.list', compact('articles'));
    }


    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('article.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $article = new Article([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'details' => $request->get('details'),
            'image' => $imageName,
        ]);
        $article->save();
        return redirect('/articles')->with('success', 'Articles has been added');
    }

  
    
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pin  $Pin
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    { 
        
         $article = Article::find($article->id);
         $article->name =  $request->get('name');
         $article->details =  $request->get('details');

        if ($file = $request->has('image')) {
            
            //delete old file
            \File::delete('images/'.$request->hidden_image);
            
             //insert new file
             $imageName = time().'.'.$request->image->extension();  
             $request->image->move(public_path('images'), $imageName);
             $article->image =  $imageName;
        }
        $article->save();
         return redirect('/articles')->with('success', 'Articles has been updating');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pin  $Pin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        \File::delete('images/'.$article->image); 
        $article->delete();
        return redirect('/articles')->with('success', 'article Deleted successfully');
    }

}