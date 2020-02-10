<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\User;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware(['auth','verified']);
      }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active = DB::table('users')->whereNull('deleted_at')->get();
        $banned = DB::table('users')->whereNotNull('deleted_at')->get();
        $users = User::OrderBy('created_at', 'DESC')->limit(5)->get();
        $posts = Post::OrderBy('created_at', 'DESC')->limit(5)->get();
        return view('home', compact('users','posts','active','banned'));
    }
}
