<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = DB::table('contacts')->orderBy('priority', 'asc')->paginate(10);
        return view('admin.contacts.index', ['contacts' => $contacts]);

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
            'name'=> 'required|max:255|unique:contacts,name|alpha_spaces'
        ]);
        Contact::create($request->all());
        return redirect('/admin/contacts');
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
        $contact=Contact::findOrfail($id);
        return view('admin.contacts.edit', compact('contact'));
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
        $contact=Contact::findOrFail($id);
        $contact->update($request->all());
        return redirect('admin/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Contact::findOrFail($id)->delete();
        return redirect('admin/contacts');
    }

    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $contacts = DB::table('contacts')->where('name', 'LIKE', '%' . $query . '%')->paginate(200);
        $contactsName=Contact::lists('name','id')->all();
        return view('admin.fields.search', ['contacts' => $contacts ,'contactsName' => $contactsName]);
        // returns a view and passes the view the list of articles and the original query.
    }
}
