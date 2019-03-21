<?php

namespace App\Http\Controllers;

use App\products;
use App\category;
use App\news;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show(products $game)
    {
        $game = products::with('category')->find($game->id);
        $categories = category::all();
        $randomGame = products::orderBy(\DB::raw('RAND()'))->first();
        $lastNews = news::orderBy('id', 'desc')->limit(3)->get();
        $lastGames = products::orderBy('id', 'desc')->limit(3)->get();
        return view('games.single', ['game' => $game, 'categories' => $categories, 'randomGame' => $randomGame, 'lastNews' => $lastNews, 'lastGames' => $lastGames]);
    }
    public function showNew(news $new)
    {
        $categories = category::all();
        $randomGame = products::orderBy(\DB::raw('RAND()'))->first();
        $lastNews = news::orderBy('id', 'desc')->limit(3)->get();
        $lastGames = products::orderBy('id', 'desc')->limit(3)->get();
        return view('news.single', ['new' => $new, 'categories' => $categories, 'randomGame' => $randomGame, 'lastNews' => $lastNews, 'lastGames' => $lastGames]);
    }
    public function search(Request $request)
    {
        $games = products::with('category')->where('name', 'LIKE', '%'.$request->get('search').'%')->get();
        $categories = category::all();
        $lastNews = news::orderBy('id', 'desc')->limit(3)->get();
        $randomGame = products::orderBy(\DB::raw('RAND()'))->first();
        return view('games.search', ['games' => $games, 'categories' => $categories, 'lastNews' => $lastNews, 'randomGame' => $randomGame]);
    }
}
