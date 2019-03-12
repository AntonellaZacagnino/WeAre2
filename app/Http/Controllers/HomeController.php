<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
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
      $posts = post::all();

        return view('home');
    }
    /**

    * @return \Illuminate\Http\Response

    */
    public function users()
    {
    $users = User::get();
      return view('users', compact('users'));
    }
    /**

      * @return \Illuminate\Http\Response

      */

      public function user($id)
      {
        $user = User::find($id);
        return view('usersView', compact('user'));
      }
      /**

      * @return \Illuminate\Http\Response
      */

      public function ajaxRequest(Request $request){
        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);
        return response()->json([‘success’=>$response]);
      }

}
