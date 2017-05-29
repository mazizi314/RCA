<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use Illuminate\Support\Facades\DB;

class AdminGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupsName=Group::lists('name','id')->all();
        $groups = DB::table('groups')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.groups.index', ['groups' => $groups ,'groupsName' => $groupsName]);
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
        $this->validate($request,[
            'name'=> 'required|max:255|unique:groups,name|alpha_spaces'
        ]);
        Group::create($request->all());
        return redirect('/admin/groups');
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
        $group=Group::findOrfail($id);
        return view('admin.groups.edit', compact('group'));
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
        $group=Group::findOrFail($id);
        $group->update($request->all());
        return redirect('admin/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::findOrFail($id)->delete();
        return redirect('admin/groups');
    }
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $groups = DB::table('groups')->where('name', 'LIKE', '%' . $query . '%')->paginate(100);
        $groupsName=Group::lists('name','id')->all();
        return view('admin.groups.search', ['groups' => $groups ,'groupsName' => $groupsName]);

    }
}
