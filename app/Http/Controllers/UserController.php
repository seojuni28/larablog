<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::where('level', 'user')->paginate(10);
        return view('user.index', compact('users'));
    }

    public function list()
    {
        $users =  User::withTrashed()->where('level', 'user')->paginate(10);
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = Post::where('user_id',$id)->paginate(10); 
        return view('user.detail', compact('user','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    public function updateprofile(Request $request){
        
        $this->validate($request,[
            'name' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|email',
            'job' => 'required|string',
            'phone' => 'required|numeric',
            'photo' => 'mimes:png,jpg,jpeg',
            'address' => 'required|string',
            'bio' => 'required|string|max:500'
        ]);

        if($request->hasFile('photo')){
            
            $images = $request->file('photo');
            $newImages = time().$images->getClientOriginalName();
            $images->move('public/uploads/user/',$newImages);

            $user = Auth::user();
            $user->photo = $newImages;
            $user->name = $request->input('name');
            $user->city = $request->input('city');
            $user->email = $request->input('email');
            $user->job = $request->input('job');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->bio = $request->input('bio');
            $user->save();
            return redirect()->back()->with('alert','Update profile success');
        }else{
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->city = $request->input('city');
            $user->email = $request->input('email');
            $user->job = $request->input('job');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->bio = $request->input('bio');
            $user->save();
            return redirect()->back()->with('alert','Update profile success');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $post = Post::find($id.'='.$user->id);
        $user->post()->forceDelete();
        $user->delete();

        return redirect()->back()->with('alert' , '' .$user->name. ' Delete Successfully (Check the user delete list for details)');
    }

    public function trashcan(){
        $users = User::onlyTrashed()->paginate(10);
        return view('user.trashcan',compact('users'));
    }

    public function trashlist(){
        $users = User::onlyTrashed()->paginate(10);
        return view('user.trashlist',compact('users'));
    }

    public function restore($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->back()->with('alert' , 'User restore successfully');
    }

    public function forcedelete($id){
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('alert' , 'User delete permanently');
    }

    public function userdetail($id){
        $users = User::findOrFail($id);
        return view('user.detail', compact('users'));
    }

    public function profile(){
        return view('user.profile', array('user' => Auth::user()));
    }
}
