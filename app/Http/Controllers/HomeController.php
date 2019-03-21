<?php

namespace App\Http\Controllers;

use App\products;
use App\category;
use App\news;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = products::all();
        $adminId = \App\User::where('is_admin', 1)->get()->toArray()[0]['id'];
        $currentId = \Auth::User()->id;
        $categories = category::all();
        $randomGame = products::orderBy(\DB::raw('RAND()'))->first();
        $lastNews = news::orderBy('id', 'desc')->limit(3)->get();

        return view('home', ['admin_id' => $adminId, 'current_id' => $currentId, 'games'=> $games, 'categories' => $categories, 'randomGame' => $randomGame, 'lastNews' => $lastNews]);
    }
    public function create(Request $request)
    {
        if (!empty($_FILES['file']['tmp_name'])) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $url = realpath('images') . DIRECTORY_SEPARATOR . $_FILES['file']['name'];
            file_put_contents($url, $fileContent);
        }
        $product = new products();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->desc = $request->get('desc');
        $product->photo = $_FILES['file']['name'];
        $product->category_id = $request->get('category_id');
        $product->save();
        return view('create');
    }
    public function createNew(Request $request)
    {
        if (!empty($_FILES['file']['tmp_name'])) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);
            $url = realpath('imagesNews') . DIRECTORY_SEPARATOR . $_FILES['file']['name'];
            file_put_contents($url, $fileContent);
        }
        $news = new news();
        $news->name = $request->get('name');
        $news->desc = $request->get('desc');
        $news->photo = $_FILES['file']['name'];
        $news->save();
        return view('createNew');
    }
    public function createCat(Request $request)
    {
        $category = new category();
        $category->name = $request->get('name');
        $category->desc = $request->get('desc');
        $category->save();
        return view('createCat');
    }
}
