<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Article::with('author')->where('featured', '=', 1)->first();
        $latest = Article::latest()->limit(2)->get();
        $articles = Article::paginate(9);

        return view('home', [
            'articles' => $articles,
            'latest' => $latest,
            'featured' => $featured
        ]);
    }
}
