<?php

namespace App\Http\Controllers;

use App\Defencelevel;
use App\Person;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminDefenceprojectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $persons=Person::with('university')->get();
        $projects=Project::with('cadrs','person','unit')->paginate(10);
        return view('admin.defences.index', ['projects' => $projects, 'persons'=>$persons]);
//        return view('admin/defences/index');

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
        $this->validate($request,[
//            'title'=> 'required|max:255|alpha_spaces',
//            'number'=> 'required|integer|unique:projects,number',
//            'opendate'=> 'required|max:255|date_format:Y/m/d',
//            'person_id'=>'required|exists:people,id',
//            'category_id',
//            'unit_id'=>'required|exists:units,id',
//            'group_id'=>'required|exists:groups,id',
//            'photo_id',
//            'cadr1'=>'required|exists:cadrs,id',
//            'cadr2'=>'required|exists:cadrs,id',
//
        ]);
        $input= $request->all();
        dd($request);
//        $defencelevel= Defencelevel::create($input);
//        $defencelevel->projects()->attach($request->,['helptype_id'=> '1']);
//        $defencelevel->cadrs()->attach($request->cadr2,['helptype_id'=> '2']);
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
        $defencelevels=Defencelevel::lists('name','id')->all();

        return view('admin.defences.edit',['defencelevels'=>$defencelevels]);
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
}
