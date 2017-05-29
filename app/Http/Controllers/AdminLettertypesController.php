<?php

namespace App\Http\Controllers;

use App\Lettertype;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminLettertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types=DB::table('lettertypes')->orderBy('priority', 'asc')->paginate(20);
        $typesName=Lettertype::lists('name','id')->all();


        return view('admin.lettertypes.index',['types' => $types ,'typesName' => $typesName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.definitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        'field'=> 'regex:/(^[A-Za-z0-9 ]+$)+/'
//        alpha_spaces
//        ^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$

//        [ا-ی\s]+
//        dd($request->all());
        $this->validate($request,[
            'name'=> 'required|max:255|unique:lettertypes,name|regex:/[ا-ی0-9\s]+/'
        ]);


        Lettertype::create($request->all());
        return redirect('/admin/lettertypes');
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
        $lettertype=Lettertype::findOrFail($id);
        return view('admin.lettertypes.edit',compact('lettertype'));
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
            'name'=> 'required|max:255|regex:/[ا-ی0-9\s]+/'
        ]);
        $lettertype=Lettertype::findOrFail($id);
        $lettertype->update($request->all());

        return redirect('admin/lettertypes');
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
        Lettertype::findOrFail($id)->delete();
        return redirect('admin/lettertypes');
    }
}
