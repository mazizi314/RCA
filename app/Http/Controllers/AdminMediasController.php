<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //

    public function index(){


        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));


    }

    public function create(){

        return view('admin.media.create');


    }

    public function store(Request $request){

    //new way to save images


//        if ($request->file('file')->isValid()) {
//            $path = $request->photo->store('images', 'public');
//        }

    //end of new way


        $file=$request->file('file');

        $name=time().$file->getClientOriginalName();

        $file->move('images',$name);

        Photo::create(['file'=>$name]);


    }

    public function destroy($id){

        $photo=Photo::findOrFail($id);

$path=public_path();
//        unlink(public_path().$photo->file);

//new way
        unlink(public_path($photo->file));
//end of new way

        //        unlink(storage_path().$photo->file);
        $photo->delete();

        return redirect('/admin/media');



    }
}
