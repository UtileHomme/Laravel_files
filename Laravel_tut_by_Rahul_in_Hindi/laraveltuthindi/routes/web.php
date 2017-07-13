<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//root url
Route::get('/', function()
{
    return view('welcome');
});


Route::get('/admin',function()
{
    echo 'Admin url';
});

//without view
Route::get('adminc','AdminController@index');

//with view
Route::get('adminv','AdminController@view');

Route::post('/admin','AdminController@postMethod');

// Route::put();
//
// Route::delete();
//
// Route::patch();
//

//with parameter
Route::get('/adminp/{number}','AdminController@parameter');

//parameter through closure
Route::get('adminpa/{number}',function($number)
{
    echo "number passed through closure is ".$number;
}
);

//optional parameters
Route::get('adminop/{number}/{second?}',function($number,$second='')
{
    echo "number passed through closure is ".$number;
    echo "Second number is $second";
}
);

//adding regular expresssions on url
Route::get('adminreg/{number}',function($number)
{
    echo "number passed through closure is ".$number;
}
)->where(['number'=>"[0-9]+"])->name('user-number');

//this url will point to adminreg above using named routes
Route::get('/adminurl',function()
{
    echo route('user-number',[234]);
}
);

//define all roots
//Admin folder will be added to default namespace
// Route::group(['middleware'=>'web','namespace'=>'Admin','as'=>'admin-','prefix'=>'admin-panel', function()
// {
//     Route::get('dashboard',
//     [
//         'as'=>'dashboard',
//         'uses'=>'AdminController@dashboard',
//     ]
//     );
//     Route::post();
//     Route::put();
//     Route::delete();
//     Route::patch();
// }
// ]);

// Route::group(['prefix'=>'admin-panel', function()
// {
//     Route::get('dashboard',
//     [
//         'as'=>'dashboard',
//         'uses'=>'AdminController@dashboard',
//     ]
//     );
// }
// ]);

Route::get('/dashboarda',function()
    {
        echo route('dashboard');
    }
);


//we can send different verbs on the same url
Route::any('/admin',function()
{

}
);

//this will accept only the mentioned verbs
Route::match(['put','patch'],'admin',function()
{

});

//using codeigniter method of using controllers - root controller
Route::get('admincon/getDashboard','AController@getDashboard');
Route::resource('admincon','AController');

//different ways to load view
Route::get('/',function()
{
    $data = [
        'Rahul','Amit','Gaurav','Abishek','Kunal'
    ];
    // return view('test-data',['data'=>$data]);
    // return view('test-data')->with('data',$data);

    return view('test-data')->withNames($data);
    //in view we'll get a variable 'names' now
}
);

// first we have to register the middleware
Route::get('/logs',function()
{
    return "<h1>Hello World!</h1>";
}
)->middleware('logger');

//another method for registering middleware
// Route::get('/logs',
// [
//     'uses'=>function()
// {
//     return "<h1>Hello World!</h1>";
// },
//     'middleware' => 'logger'    or use arrays
// ]
// );

//for DependencyController
Route::get('/dep/{name}','DependencyController@dashboard');

//for BladeController
Route::get('/blade','BladeController@dashboard');
