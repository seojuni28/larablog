<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class WelcomeController extends Controller
{
    public function index(){

        $user = User::all();
        $categories = Category::OrderBy('name','ASC')->get();
        $tags = Tag::OrderBy('name','ASC')->get();
        $posts = Post::latest()->paginate(4);
        $all = Post::OrderBy('title','DESC')->paginate(4);
        $thumbnails = Post::all()->random(1);
        $randoms = Post::all()->random(2);
        return view('welcome',compact('posts','categories','tags','all','thumbnails','user','randoms'));
    }

    public function content($slug){
        $post = Post::where('slug',$slug)->get();
        $user = User::all();
        $populars = Post::all()->where('slug','!=',$slug)->random()->limit(4);
        $categories = Category::OrderBy('name','ASC')->get();
        $tags = Tag::OrderBy('name','ASC')->get();
        return view('content', compact('post','categories','tags','user','populars'));
    }

    public function list(){
        $post = Post::OrderBy('created_at','DESC')->paginate(10);
        $categories = Category::OrderBy('name','ASC')->get();
        $tags = Tag::OrderBy('name','ASC')->get();
        return view('list', compact('post','categories','tags'));
    }

    public function categoried(Category $category){
        $categories = Category::all();
        $post = $category->post()->paginate(10);
        $tags = Tag::OrderBy('name','ASC')->get();
        return view('list', compact('post','categories','tags'));
    }

    public function tagged(Tag $tag){
        $tags = Tag::all();
        $post = $tag->posts()->paginate(10);
        $categories = Category::OrderBy('name','ASC')->get();
        return view('list', compact('post','categories','tags'));
    }

    public function search(Request $request){

        $tags = Tag::all();
        $post = Post::where('title', $request->search)->orWhere('title','like','%'.$request->search.'%')->paginate(10);
        $categories = Category::OrderBy('name','ASC')->get();
        return view('list', compact('post','categories','tags'));
    }
}
