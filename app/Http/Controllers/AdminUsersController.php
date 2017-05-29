<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::with('roles')->paginate(10);
        return view('admin.users.index', ['users' => $users]);

//        $users=User::all();
//        return view('admin.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        if(trim($request->password) == ''){

            $input=$request->except('password');
        }
        else{

            $input=$request->all();

        }
        if ($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo=Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }

        $input['password']=bcrypt($request->password);

        User::create($input);
//        User::create($request->all());
        return redirect('/admin/users');
//    return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('admin.users.show');
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

        $user=User::findOrfail($id);

        $roles=Role::lists('name','id')->all();

        return view('admin.users.edit', compact('user','roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user=User::findOrFail($id);
        if(trim($request->password) == ''){

            $input=$request->except('password');
        }
        else{

            $input=$request->all();
        }
        if ($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo=Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

//            return "photo exist";

        }

//        {{dd($user);}}
        $input['password']=bcrypt($request->password);
        $user->update($input);
        return redirect('/admin/users');
//        return view('admin.users.index', []);
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
//        User::findOrFail($id)->delete();

        $user=User::findOrfail($id);
//        unlink(public_path().$user->photo->file);
        if($user->photo->file && is_readable(public_path() . $user->photo->file))
        {
            unlink(public_path() . $user->photo->file );
        }
        $user->delete();

        Session::flash('deleted_user','کاربر مورد نظر با موفقیت پاک شد');
         return redirect('/admin/users');

//        $gallery = Gallery::findOrFail($id);
//        if($gallery->photo->file && is_readable(public_path() . $gallery->photo->file))
//        {
//            unlink(public_path() . $gallery->photo->file );
//        }
//        $gallery->delete();

//        return redirect('admin/gallery')->with('alert-success','دسته مورد نظر با موفقیت حذف شد.');





    }
}
