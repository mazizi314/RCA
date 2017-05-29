<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminUnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitsName=Unit::lists('name','id')->all();
        $units = DB::table('units')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.units.index', ['units' => $units ,'unitsName' => $unitsName]);
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
        Unit::create($request->all());
        return redirect('/admin/units');
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

        $unit=Unit::findOrfail($id);
        return view('admin.units.edit', compact('unit'));
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
        $unit=Unit::findOrFail($id);
        $unit->update($request->all());
        return redirect('admin/units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::findOrFail($id)->delete();
        return redirect('admin/units');
    }
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $units = DB::table('units')->where('name', 'LIKE', '%' . $query . '%')->paginate(100);
        $unitsName=Unit::lists('name','id')->all();
        return view('admin.units.search', ['units' => $units ,'unitsName' => $unitsName]);

    }
}
