<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Photo;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::lists('name','id')->all();

        return view('admin.posts.create',compact('categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input= $request->all();
        $user=Auth::user();

//        Check the existing of Picture file
        if ($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $user->posts()->create($input);
        return redirect('/admin/posts');



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
        //
        $post=Post::findOrFail($id);
        $categories=Category::lists('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
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
        //
        $input= $request->all();

//        Check the existing of Picture file
        if ($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
      Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);
//        unlink(public_path() . $post->photo->file);
        if($post->photo->file && is_readable(public_path() . $post->photo->file))
        {
            unlink(public_path() . $post->photo->file );
        }

        $post->delete();
        return redirect('/admin/posts');

    }
    public function search1(Request $request)
    {
        // Simple search

        $query=$request->input('searchbox');
//        dd($query);
//        $users = User::search($query)->get();
//
//// Search and get relations
//// It will not get the relations if you don't do this
//        $users = User::search($query)
//            ->with('posts')
//            ->get();
        $posts=Post::search($query)->get();
//        dd($posts);
        return view('admin.posts.result',compact('posts'));
    }
}
