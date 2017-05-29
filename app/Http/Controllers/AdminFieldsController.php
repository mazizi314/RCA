<?php

namespace App\Http\Controllers;

use App\Field;
use App\University;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminFieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fieldsName=Field::lists('name','id')->all();
        $fields = DB::table('fields')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.fields.index', ['fields' => $fields ,'fieldsName' => $fieldsName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields=Field::lists('name')->all();
        return view('admin.field.create',compact('fields'));
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
            'name'=> 'required|max:255|unique:fields,name|alpha_spaces'
        ]);
        Field::create($request->all());
        return redirect('/admin/fields');
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
        $field=Field::findOrfail($id);
        return view('admin.fields.edit', compact('field'));
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
        $field=Field::findOrFail($id);
        $field->update($request->all());
        return redirect('admin/fields');
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
        Field::findOrFail($id)->delete();
        return redirect('admin/fields');
    }

    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $fields = DB::table('fields')->where('name', 'LIKE', '%' . $query . '%')->paginate(200);
        $fieldsName=Field::lists('name','id')->all();
        return view('admin.fields.search', ['fields' => $fields ,'fieldsName' => $fieldsName]);
        // returns a view and passes the view the list of articles and the original query.
//        return view('admin.universities.create', compact('queryoutputs', 'query'));
        //return view('admin.universities.index', compact('universities'));
    }
}
