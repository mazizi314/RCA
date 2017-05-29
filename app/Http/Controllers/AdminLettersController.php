<?php

namespace App\Http\Controllers;

use App\Letter;
use App\Lettertype;
use App\Photo;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminLettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::with('project')->latest()->paginate(10);
        $projects=Project::all(['number','title','id'])->all();
        $lettertypess=Lettertype::lists('name','id')->all();
        return view('admin.letters.index', ['letters' => $letters,'projects'=>$projects ,'lettertypes'=>$lettertypess]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::all(['number','title','id'])->all();
        $lettertypes=Lettertype::lists('name','id')->all();
        return view('admin.letters.create', ['projects' => $projects,'lettertypes'=>$lettertypes]);
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
            'number'=> 'required|max:255|unique:letters,number',
            'lettertype_id'=>'required|exists:lettertypes,id',
            'mozo'=>'required',
            'date'=> 'required|max:255',   //   |date_format:Y/m/d',
            'project_id'=>'required|exists:projects,id',


        ]);
        $input=$request->all();
//        Check the existing of Picture file
        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $file->move($destinationPath,$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
//        Check the existing of Attached file
        if ($file=$request->file('attached_file_id')){
            $name=time().$file->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $file->move($destinationPath,$name);
            $photo = Photo::create(['file'=>$name]);
            $input['attached_file_id']=$photo->id;
        }

//        $input=$request->all();
//        dd($input);
        Letter::create($input);
        return redirect()->back();
//        return redirect('/admin/letters');
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
        $letter=Letter::findOrFail($id);
        $projects=Project::all(['number','title','id'])->all();
        $lettertypes=Lettertype::lists('name','id')->all();

        return view('admin.letters.edit', ['letter'=>$letter,'projects' => $projects,'lettertypes'=>$lettertypes]);
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

        $letter=Letter::findOrFail($id);
        $this->validate($request,[
//            'number'=> 'required|max:255|unique:letters,number',
            'lettertype_id'=>'required|exists:lettertypes,id',
            'mozo'=>'required',
            'date'=> 'required|max:255|date_format:Y/m/d',
            'project_id'=>'required|exists:projects,id',

        ]);


        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }

        $input=$request->all();
        $letter->update($input);
//        return redirect()->back();

//        return redirect()->action('App\Http\Controllers\AdminProjectsController@show', [$id]);

        return redirect('/admin/letters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $letter=Letter::findOrFail($id);
//        unlink(public_path().$user->photo->file);
        if (isset($letter->photo->file))
        {
            if(is_readable(public_path() . $letter->photo->file))
            {
                unlink(public_path() . $letter->photo->file );
            }
        }
        $letter->delete();

        Session::flash('deleted_user','نامه مورد نظر با موفقیت پاک شد');
        return redirect('/admin/letters');
    }

    public function search1(Request $request)
    {

        // Gets the query string from our form submission
        $query = $request->input('searchbox');
        $letters = Letter::search($query)->paginate(50);;

        return view('admin.letters.result', compact('letters'));

    }


}
