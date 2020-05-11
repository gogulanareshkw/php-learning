<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');        // it will authenticate all views
        $this->middleware('auth',['except'=>['index','show']]);          // authenticate all views except index,show pages
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();   // to get all posts
//        $posts = Post::orderBy('created_at','desc')->get();   // to get all posts in desc order
//        $posts Post::orderBy('title','desc')->take(1)->get();   // to get all posts in desc order and take 1 post
//        $post = Post::where('title','Post Two')->get();   // to get single post
//        $posts = DB::select('SELECT * from posts');
//        $posts = Post::orderBy('title','desc')->paginate(1);   // to get all posts in desc order use --> {{$posts->Links()}}

        return view('posts.index')-> with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=> 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            //get filename to store
            $filenameToStore = $filename.'_'.time().".".$ext;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        } else {
            $filenameToStore = 'noImage.jpg';
        }

        $post = new Post;
        $post-> title = $request -> input('title');
        $post-> body= $request -> input('body');
        $post-> user_id = auth()->user()->id;
        $post-> cover_image = $filenameToStore;
        $post -> save();
        return redirect('/posts')->with('success','Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user->id){
            return view('/posts')->with('error','Unauthorized Page');
        }
        return view('posts.edit')->with('post',$post);
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
            'title'=> 'required',
            'body'=> 'required'
        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get only ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            //get filename to store
            $filenameToStore = $filename.'_'.time().".".$ext;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $post = Post::find($id);
        $post -> title = $request -> input('title');
        $post -> body= $request -> input('body');
        if($request->hasFile('cover_image')){
            $post-> cover_image = $filenameToStore;
        }
        $post -> save();
        return redirect('/posts')->with('success','Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user->id){
            return view('/posts')->with('error','Unauthorized Page');
        }

        if($post->cover_image != 'noImage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post -> delete();
        return redirect('/posts')->with('success','Post Deleted!');
    }
}
