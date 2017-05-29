<?php

namespace App\Http\Controllers;

use App\Cadr;
use App\Contact;
use App\Defencelevel;
use App\Group;
use App\Lettertype;
use App\Person;
use App\Unit;
use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadrs=Cadr::lists('lname','id')->all();
        $persons=Person::with('university')->get();
        $projects=Project::with('cadrs','person','unit','defencelevels')->paginate(10);
        return view('admin.projects.index', ['projects' => $projects, 'persons'=>$persons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personsfname=Person::lists('fname','id')->all();
        $personslname=Person::lists('lname','id')->all();
        $mojriname=Person::all(['fname','lname','id'])->all();
//        lists('fname','lname','id')->all();
//        dd($mojriname);
        $units=Unit::lists('name','id')->all();
        $cadrs=Cadr::all(['fname','lname','id'])->all();
        $groups=Group::lists('name','id')->all();
        return view('admin.projects.create',['personsfname'=>$personsfname,
            'personslname'=>$personslname,
            'mojriname'=>$mojriname,
            'units'=>$units,
            'cadrs'=>$cadrs,
            'groups'=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'title'=> 'required|max:255',
            'number'=> 'required|integer|unique:projects,number',
            'opendate'=> 'required|max:255|date_format:Y/m/d',
            'person_id'=>'required|exists:people,id',
            'category_id',
            'unit_id'=>'required|exists:units,id',
            'group_id'=>'required|exists:groups,id',
            'photo_id',
            'cadr1'=>'required|exists:cadrs,id',
            'cadr2'=>'required|exists:cadrs,id',
            'kasri1',
            'kasri2',
            'kasri3',
            'bookfishdate',
            'booksend',
            'bookcount',
        ]);

        $input= $request->all();
//        $user=Auth::user

//        Check the existing of Picture file
        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        {{dd($input);}}
//        $input['university_id']=$request->univesity_id;
        // $user->people()->create($input);
//        if ($university=$request->select('universitiesname')){
//            $university=University::findOrfail($id);
//            $input['university_id']=$university->id;
//        }
        $project= Project::create($input);
        $project->cadrs()->attach($request->cadr1,['helptype_id'=> '1']);
        $project->cadrs()->attach($request->cadr2,['helptype_id'=> '2']);
        $project->cadrs()->attach($request->cadr3,['helptype_id'=> '3']);
        $project->cadrs()->attach($request->cadr4,['helptype_id'=> '4']);
        $project->cadrs()->attach($request->cadr5,['helptype_id'=> '5']);
        return redirect('/admin/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $project=Project::findOrfail($id);
//        return view('admin.projects.show', compact('project'));
        $project=Project::with('cadrs','person','defencelevels','letters')->findOrFail($id);
        $defencelevelsName=Defencelevel::lists('name','id')->all();
        $lettertypes=Lettertype::lists('name','id')->all();
        $cadrs=Cadr::all(['fname','lname','id'])->all();
        $contacts=Contact::lists('name','id')->all();

        return view('admin.projects.show', ['project' => $project,
            'cadrs'=>$cadrs,
            'contacts'=>$contacts,
            'lettertypes'=>$lettertypes,
            'defencelevelsName'=>$defencelevelsName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::findOrfail($id);
//            ->with('cadrs','person','unit','defencelevels');
        $units=Unit::lists('name','id')->all();
        $groups=Group::lists('name','id')->all();
        $cadrs=Cadr::all(['fname','lname','id'])->all();
        $defencelevels=Defencelevel::lists('name','id')->all();
        $mojriname=Person::all(['fname','lname','id'])->all();
        return view('admin.projects.edit', compact('project','units','groups','cadrs','defencelevels','mojriname'));
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
//dd($request);
        $input= $request->all();
//        dd($input);
        $project= Project::findOrFail($id);
        $project->defencelevels()->attach($request->defencelevel_id,[
            'defencedate'=> $request->defencedate,
            'letterdate'=>$request->letterdate,
            'letternumber'=>$request->letternumber
        ]);
//        $project->cadrs()->attach($request->cadr3,['helptype_id'=> '3']);
        $project->update($input);

//        $user->roles()->sync( array(
//            1 => array( 'expires' => true ),
//            2 => array( 'expires' => false ),
//    ...
//));


//        sync( array(
//            related_id => array( 'pivot_field' => value ),
//    ...
//));
        $project->cadrs()->sync(array($request->cadr1=> array( 'helptype_id' => 1 )));
        $project->cadrs()->sync(array($request->cadr2=> array( 'helptype_id' => 2 )));

//        How To Update pivot table
//        $post = \App\Post::find($id);
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
//        $post->tags()->sync($request->tags);
//        return 'Post Updated!';
//        $project->cadrs()->sync($request->cadrs);
//        $project->cadrs()->sync($request->cadr1,['helptype_id'=> '1']);
//        $project->cadrs()->sync($request->cadr2,['helptype_id'=> '2']);
//        $project->cadrs()->attach($request->cadr3,['helptype_id'=> '3']);
//        $project->cadrs()->attach($request->cadr4,['helptype_id'=> '4']);
//        $project->cadrs()->attach($request->cadr5,['helptype_id'=> '5']);
//
        return redirect('/admin/projects/'.$id);
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
    }
    public function defences($id)
    {
        // Gets the query string from our form submission

//        $query = $id->input('defences');

        $project=Project::findOrfail($id);
        dd($project);
        return view('admin.projects.defences', compact('project'));
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
//        $projects=Project::with('cadrs','person','unit')->paginate(10);
//        return view('admin.projects.defences', ['projects' => $projects]);

//        return view('admin.projects.defence', ['universities' => $universities ,'universitiesName' => $universitiesName]);
        // returns a view and passes the view the list of articles and the original query.
//        return view('admin.universities.create', compact('queryoutputs', 'query'));
        //return view('admin.universities.index', compact('universities'));
    }
    public function search1(Request $request)
    {

        // Gets the query string from our form submission
        $query = $request->input('searchbox');
        $projects=Project::search($query)->paginate(200);
//        dd($posts);
        return view('admin.projects.result',compact('projects'));

    }
    public function davarha(Request $request,$id)
    {
//dd($request);


        $this->validate($request,[
        'birthdate'=> 'required|max:255|date_format:Y/m/d',
        ]);
        $project= Project::findOrFail($id);
        $project->kasri1=$request->kasri1;
        $project->kasri2=$request->kasri2;
        $project->kasri3=$request->kasri3;
        $project->bookfishdate=$request->bookfishdate;
        $project->bookcount=$request->bookcount;
        $project->save();
//        $project->cadrs()->sync($request->cadr1,['helptype_id'=> '1']);
//        $project->cadrs()->sync($request->cadr2,['helptype_id'=> '2']);
        if ($request->cadr3!="") {
            $project->cadrs()->attach($request->cadr3,['helptype_id'=> '3']);
        }
        if ($request->cadr4!=""){
            $project->cadrs()->attach($request->cadr4,['helptype_id'=> '4']);
        }
        if (($request->cadr5)!=""){
            $project->cadrs()->attach($request->cadr5,['helptype_id'=> '5']);
        }

//        return view('admin.projects.index',compact('projects'));
        return redirect('/admin/projects/'.$id);

    }

}
