<?php

namespace App\Http\Controllers;

use App\Field;
use App\Major;
use App\Person;
use App\Photo;
use App\University;
use DB;
use Illuminate\Support\Facades\Session;
use PDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminPersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $universities = University::lists('name', 'id')->all();
        $persons = Person::with('university', 'field', 'major', 'projects')->paginate(10);
        return view('admin.persons.index', ['persons' => $persons, 'universities' => $universities]);
//        return view('admin.persons.index',compact('persons','personsPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $universities=University::lists('name','id')->all();

        $universities = University::lists('name', 'id')->all();
        $fields = Field::lists('name', 'id')->all();
        $majors = Major::lists('name', 'id')->all();
//        $majors = Major::with('field')->latest()->paginate(10);
//        return view('admin.universities.index', ['universities' => $universities ,'universitiesName' => $universitiesName]);

        return view('admin.persons.create', compact('universities', 'fields', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    function isValidIranianNationalCode($input) {
        # check if input has 10 digits that all of them are not equal
        if (!preg_match("/^\d{10}$/", $input)) {
            return false;
        }

        $check = (int) $input[9];
        $sum = array_sum(array_map(function ($x) use ($input) {
                return ((int) $input[$x]) * (10 - $x);
            }, range(0, 8))) % 11;

        return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);
    }


    public function store(Request $request)
    {
//        dd($request);
//        dd($this->isValidIranianNationalCode($request->input('nationalcode')));
        if ($this->isValidIranianNationalCode($request->input('nationalcode'))){

            $this->validate($request, [
                'fname' => 'required|max:255|alpha_spaces',
                'lname' => 'required|max:255|alpha_spaces',
                'nationalcode' => 'required|max:255|unique:people,nationalcode|min:10|max:10|regex:^.*(?=.*[0-9]).*$^',
                'fathername' => 'required|max:255|alpha_spaces',
                'university_id' => 'required|exists:universities,id',
                'major_id' => 'required|exists:majors,id',
                'field_id' => 'required|exists:fields,id',
                'email' => 'email',
//            mobile regex : 09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}
                'cellphone' => 'required|min:11|max:11|regex:^.*(?=.*[0-9]).*$^',
                'telephone' => 'min:8|max:11|regex:^.*(?=.*[0-9]).*$^',
                'birthdate' => 'required|max:255|date_format:Y/m/d',

            ]);
            $input = $request->all();
            $user = Auth::user();

//        Check the existing of Picture file
            if ($file = $request->file('photo_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['photo_id'] = $photo->id;
            }
            if ($file = $request->file('nationalcode_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['nationalcode_file_id'] = $photo->id;
            }
            if ($file = $request->file('card_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['card_file_id'] = $photo->id;
            }
            if ($file = $request->file('cv_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['cv_file_id'] = $photo->id;
            }
            if ($file = $request->file('address_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['address_file_id'] = $photo->id;
            }
            if ($file = $request->file('degree_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['degree_file_id'] = $photo->id;
            }

//        {{dd($input);}}
//
            Person::create($input);
            return redirect('/admin/persons');}
        else

            Session::flash('message', 'کد ملی وارد شده اشتباه است!');
        Session::flash('alert-class', 'alert-danger');
        return redirect('/admin/persons/create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::findOrfail($id);

        $universities = University::lists('name', 'id')->all();
        $fields = Field::lists('name', 'id')->all();
        $majors = Major::lists('name', 'id')->all();
        return view('admin.persons.edit', compact('person', 'universities', 'fields', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->isValidIranianNationalCode($request->input('nationalcode'))) {
            $person = Person::findOrFail($id);
            $this->validate($request, [
                'fname' => 'required|max:255|alpha_spaces',
                'lname' => 'required|max:255|alpha_spaces',
                'nationalcode' => 'required|max:255|unique:people,nationalcode,' . $id . '|min:10|max:10|regex:^.*(?=.*[0-9]).*$^',
                'fathername' => 'required|max:255|alpha_spaces',
                'university_id' => 'required|exists:universities,id',
                'major_id' => 'required|exists:majors,id',
                'field_id' => 'required|exists:fields,id',
                'email' => 'email',
                'cellphone' => 'required|min:11|max:11|regex:^.*(?=.*[0-9]).*$^',
                'telephone' => 'min:8|max:11|regex:^.*(?=.*[0-9]).*$^',
            ]);

            if (trim($request->password) == '') {
                $input = $request->except('password');
            } else {
                $input = $request->all();
            }
            if ($file = $request->file('photo_id')) {

                $name = time() . $file->getClientOriginalName();

                $file->move('images', $name);

                $photo = Photo::create(['file' => $name]);

                $input['photo_id'] = $photo->id;

//            return "photo exist";
            }

            if ($file = $request->file('nationalcode_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['nationalcode_file_id'] = $photo->id;
            }
            if ($file = $request->file('card_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['card_file_id'] = $photo->id;
            }
            if ($file = $request->file('cv_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['cv_file_id'] = $photo->id;
            }
            if ($file = $request->file('address_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['address_file_id'] = $photo->id;
            }
            if ($file = $request->file('degree_file_id')) {
                $name = time() . $file->getClientOriginalName();
                $destinationPath = public_path() . '/images';
                $file->move($destinationPath, $name);
                $photo = Photo::create(['file' => $name]);
                $input['degree_file_id'] = $photo->id;
            }

            $input['password'] = bcrypt($request->password);
            $person->update($input);
            return redirect('/admin/persons');

        }
        else

            Session::flash('message', 'کد ملی وارد شده اشتباه است!');
        Session::flash('alert-class', 'alert-danger');
//        return redirect('/admin/persons');
        return redirect('/admin/persons/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::findOrfail($id);
//        unlink(public_path().$user->photo->file);
        if (isset($person->photo->file)) {
            if (is_readable(public_path() . $person->photo->file)) {
                unlink(public_path() . $person->photo->file);
            }
        }
        $person->delete();

        Session::flash('deleted_user', 'همکار مورد نظر با موفقیت پاک شد');
        return redirect('/admin/persons');

    }

    public function export()
    {
        $persons = Person::all();
        $pdf = PDF::loadView('pdf', ['persons' => $persons]);
        return $pdf->download('export.pdf');
    }

    public function favorite(Request $request)
    {

        $person = Person::find($request->get('id'));

//        \Auth::user()->favorites()->save($person);
//
//        return \Redirect::route('/admin/persons')->with('success', 'ادیت شد مثلا!');

        //return view('admin.persons.edit', compact('person'));//->with('success', 'ادیت شد مثلا!');
        return redirect('/admin/persons')->with('success', 'ادیت شد مثلا!');
    }

    public function excel()
    {

        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

        $payments = Person::join('persons', 'persons.id', '=', 'university.id')
            ->select(
                'university.id',
                \DB::raw("concat(persons.fname, ' ', persons.lname) as `name`"),
                'persons.email',
                'payments.total',
                'persons.created_at')
            ->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $paymentsArray = [];

        // Define the Excel spreadsheet headers
        $paymentsArray[] = ['id', 'name', 'email', 'university', 'created_at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($payments as $payment) {
            $paymentsArray[] = $payment->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('payments', function ($excel) use ($invoicesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($paymentsArray) {
                $sheet->fromArray($paymentsArray, null, 'A1', false, false);
            });

        })->download('xlsx');
    }

    public function search1(Request $request)
    {
//

        // Gets the query string from our form submission
        $query = $request->input('searchbox');
        $persons = Person::search($query)->paginate(50);;
//        dd($posts);
        return view('admin.persons.result', compact('persons'));


// Search and get relations
// It will not get the relations if you don't do this
//        $users = User::search($query)
//            ->with('posts')
//            ->get();


        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
////        $persons = DB::table('people')->where('nationalcode', 'LIKE', '%' . $query . '%')->paginate(100);
////        $personsName=Person::lists('nationalcode','id')->all();
//        $personsName=Person::with('university','field','major');
//        return view('admin.persons.search', ['persons' => $persons ,'personsName' => $personsName,'universities'=>$universities]);
        // returns a view and passes the view the list of articles and the original query.
//        return view('admin.universities.create', compact('queryoutputs', 'query'));
        //return view('admin.universities.index', compact('universities'));
    }

    public function word()
    {
//

        // Gets the query string from our form submission
        // $query = $request->input('searchbox');
        //$persons=Person::search($query)->paginate(50);;
//        dd($posts);
        return view('admin.persons.word');
    }
}
