<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/ali', 'HomeController@ali');

Route::get('/admin', function (){

    return view('admin.index');

});

Route::group(['middleware'=>'admin'],function (){

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/persons', 'AdminPersonsController');
    Route::resource('admin/definitions', 'AdminLettertypesController');
    Route::resource('admin/universities', 'AdminUniversitiesController');
    Route::resource('admin/projects', 'AdminProjectsController');
    Route::resource('admin/cadrs', 'AdminCadrsController');
    Route::resource('admin/cadrprojects', 'AdminCadrprojectsController');
    Route::resource('admin/definitions', 'AdminDefencelevelsController');
    Route::resource('admin/projectdefences', 'AdminProjectdefencesController');
    Route::resource('admin/fields', 'AdminFieldsController');
    Route::resource('admin/majors', 'AdminMajorsController');
    Route::resource('admin/units', 'AdminUnitsController');
    Route::resource('admin/groups', 'AdminGroupsController');
    Route::resource('admin/defences','AdminDefenceprojectsController');
    Route::resource('admin/lettertypes','AdminLettertypesController');
    Route::resource('admin/letters','AdminLettersController');
    Route::resource('admin/contacts','AdminContactsController');

//   Route::get('admin/media/upload', ['as'=>'admin.media.upload',  'uses'=>'AdminMediaController@store']);

//    Route::get('admin/universities/create', 'AdminUniversitiesController');
});

//Rout::resource('admin/users', 'AdminUsersController');

//Route::post('/admin/persons/index',
//    [ 'as' => 'admin.persons.index',
//        'uses' => 'AdminPersonsController@favorite'
//    ]);

Route::post('/admin/universities/search',
    [ 'as' => 'admin.universities.search',
      'uses' => 'AdminUniversitiesController@search'
    ]);
Route::post('/admin/fields/search',
    [ 'as' => 'admin.fields.search',
      'uses' => 'AdminFieldsController@search'
    ]);
Route::post('/admin/majors/search',
    [ 'as' => 'admin.majors.search',
        'uses' => 'AdminMajorsController@search'
    ]);
Route::post('/admin/units/search',
    [ 'as' => 'admin.units.search',
        'uses' => 'AdminUnitsController@search'
    ]);
Route::post('/admin/groups/search',
    [ 'as' => 'admin.groups.search',
        'uses' => 'AdminGroupsController@search'
    ]);
Route::post('/admin/contacs/search',
    [ 'as' => 'admin.contacts.search',
        'uses' => 'AdminGroupsController@search'
    ]);
Route::post('/admin/persons/result',
    [ 'as' => 'admin.persons.result',
        'uses' => 'AdminPersonsController@search1'
    ]);

Route::post('/admin/projects/result',
    [ 'as' => 'admin.projects.result',
        'uses' => 'AdminProjectsController@search1'
    ]);

Route::post('/admin/posts/result',
    [ 'as' => 'admin.posts.result',
        'uses' => 'AdminPostsController@search1'
    ]);
Route::post('/admin/letters/result',
    [ 'as' => 'admin.letters.result',
        'uses' => 'AdminLettersController@search1'
    ]);
Route::post('/admin/projects/{id}',
    [ 'as' => 'admin.project.davarha',
        'uses' => 'AdminProjectsController@davarha'
    ]);
Route::get('word', function()
{
    return view('word/index');
});
//Route::get('/admin', 'AdminProjectsController@davarha');
//Route::post('/admin/projects/{id}', 'AdminProjectsController@davarha');
//Route::post('/admin/projects/defences',
//    [ 'as' => 'admin.projects.defences',
//        'uses' => 'AdminProjectsController@defences'
//    ]);
//Route::get('admin.projects.defences?{id}', function ($id) {
//    [ 'as' => 'admin.projects.defences',
//        'uses' => 'AdminProjectsController@defences'
//    ];
//    return 'User '.$id;
//});
//Route::post('/admin/persons',
//    [ 'as' => 'admin.persons.select',
//        'uses' => 'AdminPersonsController@select'
//    ]);
//Route::get('admin/persons/pdf', 'AdminPersonsController@export');
Route::get('/admin/persons/pdf',
    [
        'as' => 'admin.persons.pdf',
        'uses' => 'AdminPersonsController@export'
    ]);

Route::get('/admin/persons/excel',
    [
        'as' => 'admin.persons.excel',
        'uses' => 'AdminPersonsController@excel'
    ]);



