<?php

namespace App\Http\Controllers;

use App\Field;
use App\Major;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminMajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields=Field::lists('name','id')->all();
        $majorsName=Major::lists('name','id')->all();
        //$majors = DB::table('majors')->orderBy('created_at', 'desc')->paginate(10);
        $majors = Major::with('field')->latest()->paginate(10);
//        dd($majorsName);
        return view('admin.majors.index', ['majors' => $majors ,'majorsName' => $majorsName , 'fields'=>$fields]);
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
//        dd($request);
        $this->validate($request,[
            'name'=> 'required|max:255|unique:majors,name|alpha_spaces',
            'field_id'=>'required|exists:fields,id'
        ]);
        $input=$request->all();
        Major::create($input);
        return redirect('/admin/majors');
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
        $major=Major::findOrfail($id);
        $fields=Field::lists('name','id')->all();
        return view('admin.majors.edit', ['major' => $major , 'fields'=>$fields]);
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
        $major=Major::findOrFail($id);
        $major->update($request->all());
        return redirect('admin/majors');
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
        Major::findOrFail($id)->delete();
        return redirect('admin/majors');
    }
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $majors = DB::table('majors')->where('name', 'LIKE', '%' . $query . '%')->paginate(100);

        $majorsName=Major::lists('name','id')->all();

        return view('admin.majors.search', ['majors' => $majors ,'majorsName' => $majorsName]);
        // returns a view and passes the view the list of articles and the original query.

    }
}
