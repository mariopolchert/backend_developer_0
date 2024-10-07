<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author', 'tags', 'category')->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles.create', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            // 'user_id' => auth()->id(),
            'user_id' => Auth::id(),
            'category_id' => $request->category,
        ]);

        $article->tags()->attach($request->tags);

        if ($image = $request->file('image')) {
             $path = $image->store("images/articles/$article->id", "public");
             $article->update(['image' => $path]);
        }

        // return redirect()->route('articles.index')->with('flash_message', 'Porkua');
        return redirect()->route('articles.index')->withFlashMessage("Uspjesno kreiran Article");

    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

}
