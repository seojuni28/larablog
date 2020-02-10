<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class ProfileController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        $categories = Category::OrderBy('name','ASC')->get();
        $tags = Tag::OrderBy('name','ASC')->get();
        $posts = Post::where('user_id',$id)->paginate(10); 
        return view('detail',compact('user','posts','categories','tags'));
    }
}
