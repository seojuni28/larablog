<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'admin'){
            $posts = Post::OrderBy('created_at', 'DESC')->paginate(8);
        }elseif(Auth::user()->level == 'user'){
            $posts = Post::where('user_id' , Auth::user()->id)->paginate(8);
        }
        return view('post.index',compact('posts'));
    }

    public function list(){
        if(Auth::user()->level == 'admin'){
            $posts = Post::OrderBy('created_at', 'DESC')->paginate(10);
        }elseif(Auth::user()->level == 'user'){
            $posts = Post::where('user_id' , Auth::user()->id)->paginate(10);
        }
        return view('post.list',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::OrderBy('name', 'ASC')->get();
        return view('post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string|max:100|min:3',
            'category_id' => 'required',
            'content' => 'required|string|min:100',
            'photo' => 'required|mimes:png,jpg,jpeg'

        ]);

        $images = $request->photo;
        $newImages = time().$images->getClientOriginalName(); 

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'photo' => $newImages,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);

        $images->move('public/uploads/posts/',$newImages);

        return redirect()->route('list')->with('alert','' .$post->title. ' Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        $categories = Category::OrderBy('name' , 'ASC')->get();

        return view('post.edit', compact('post' , 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|string|max:100|min:3',
            'category_id' => 'required',
            'content' => 'required|string|min:100',
            'photo' => 'mimes:png,jpg,jpeg'

        ]);

        $post = Post::findOrFail($id);

        if($request->has('photo')){
            
            $images = $request->photo;
            $newImages = time().$images->getClientOriginalName();
            $images->move('public/uploads/posts/',$newImages);

            $post->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'photo' => $newImages,
                'slug' => Str::slug($request->title)
            ]);
        }else{
            $post->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->title)
            ]);
        }

        $post->tags()->sync($request->tags);

        return redirect()->route('list')->with('alert','' .$post->title.' Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('alert' , '' .$post->title. ' Delete Successfully (Check the Deleted Articles)');
    }

    public function trashcan(){

        if(Auth::user()->level == 'admin'){
            $posts = Post::onlyTrashed()->paginate(8);
        }elseif(Auth::user()->level == 'user'){
            $posts = Post::onlyTrashed()->where('user_id' , Auth::user()->id)->paginate(10);
        }
        
        return view('post.trashcan', compact('posts'));
    }

    public function trashlist(){
        if(Auth::user()->level == 'admin'){
            $posts = Post::onlyTrashed()->paginate(10);
        }elseif(Auth::user()->level == 'user'){
            $posts = Post::onlyTrashed()->where('user_id' , Auth::user()->id)->paginate(10);
        }
        
        return view('post.trashlist', compact('posts'));
    }

    public function forcedelete($id){

        Post::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('alert' ,'Permanently deleted');
    }

    public function restore($id){
        Post::withTrashed()->find($id)->restore();
        return redirect()->back()->with('alert', 'File Has been restored');
    }
}
