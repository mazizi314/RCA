<?php

namespace App\Http\Controllers;

use App\Cadr;
use App\Field;
use App\Major;
use App\University;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class AdminCadrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $persons = Person::with('university', 'field', 'major', 'projects')->paginate(10);

//        $cadrs = DB::table('cadrs')->paginate(10);
        $cadrs=Cadr::with('field','major','unit')->paginate(10);
        return view('admin.cadrs.index', ['cadrs' => $cadrs]);

//        $cadrs=Cadr::all();
//        return view('admin.cadrs.index',compact('cadrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $universities=University::lists('name','id')->all();
        $fields=Field::lists('name','id')->all();
        $majors=Major::lists('name','id')->all();
        return view('admin.cadrs.create',['majors'=>$majors,'fields' => $fields, 'universities'=>$universities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();
        Cadr::create($input);
        return redirect('/admin/cadrs');
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
        $cadr=Cadr::findOrfail($id);

//        $roles=Role::lists('name','id')->all();

        return view('admin.cadrs.edit', compact('cadr'));
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
        $cadr=Cadr::findOrFail($id);
        $cadr->update($request->all());
        return redirect('admin/cadrs');
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
