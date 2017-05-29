<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AdminUniversitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universitiesName=University::lists('name','id')->all();
        $universities = DB::table('universities')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.universities.index', ['universities' => $universities ,'universitiesName' => $universitiesName]);
        //$universities=University::all();
       // return view('admin.universities.index',compact('universities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $universities=University::lists('name')->all();
        return view('admin.universities.create',compact('universities'));
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
            'name'=> 'required|max:255|unique:universities,name|alpha_spaces'
        ]);
        University::create($request->all());
        return redirect('/admin/universities');
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
        $university=University::findOrFail($id);
        return view('admin.universities.edit',compact('university'));
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
        $university=University::findOrFail($id);
        $university->update($request->all());
        return redirect('admin/universities');

        //  return view('admin.universities.edit',compact('university'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        University::findOrFail($id)->delete();
        return redirect('admin/universities');
    }
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $universities = DB::table('universities')->where('name', 'LIKE', '%' . $query . '%')->paginate(200);

        $universitiesName=University::lists('name','id')->all();

        return view('admin.universities.search', ['universities' => $universities ,'universitiesName' => $universitiesName]);
        // returns a view and passes the view the list of articles and the original query.
//        return view('admin.universities.create', compact('queryoutputs', 'query'));
        //return view('admin.universities.index', compact('universities'));
    }
}
