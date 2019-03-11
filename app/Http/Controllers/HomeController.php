<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

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
        return view('home');
    }


    public function listadoPost() {
        $posteos = Post::all();
        $vac = compact("posteos");
        return view("home", $vac);
      }
     /* public function index()
      {
        $posts = Post::orderBy("id", "DESC")->get();
        return view("home")->with("posts", $posts);
      }*/

    public function search(Request $req) {
        $search = $req["search"];
        $products = User::where("name", "like", "%$search%")->get();
        return view("search", compact("users"));
      }
}
