<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllerR;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\actorController;
use App\Http\Controllers\movieController;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\QueryDataTable;
use DataTables as DataTables2;
use Yajra\DataTables\Html\Builder;


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

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes

Route::prefix('admin')->group(function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [App\Http\Controllers\Auth\AdminLoginController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [App\Http\Controllers\Auth\AdminLoginController::class, 'register'])->name('admin.register.submit');
    Route::get('/forget_passowrd', [App\Http\Controllers\Auth\AdminLoginController::class, 'forget_passowrd'])->name('admin.forget_passowrd');
    Route::post('/forget_passowrd', [App\Http\Controllers\Auth\AdminLoginController::class, 'forget_passowrd_post'])->name('admin.forget_passowrd.submit');
    Route::get('/recover_password/{token}', [App\Http\Controllers\Auth\AdminLoginController::class, 'recover_password'])->name('admin.recover_password');
    Route::post('/recover_password/{token}', [App\Http\Controllers\Auth\AdminLoginController::class, 'recover_password_post'])->name('admin.recover_password.submit');
    Route::any('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
    Route::resource('/datatable', AdminControllerR::class);
    Route::post('datatable/export', [AdminControllerR::class, 'index']);
    

    Route::resource('users', UsersController::class );
    //DataTables2 $admin;
    //return $admin->render('admin.intro', ['title'=>'Admin Contoller']);

    Route::get('user-data', function() {
        $model =  App\Models\Admin::query();
        $us = DataTables2::eloquent($model)->toJson();
        return view('intro', ['name' => $us]);
    });


    Route::get('html', function(Builder $builder) {
        if (request()->ajax()) {
            return DataTables::of(App\Models\Admin::query())->toJson();
        }

        $column = [
            'defaultContent' => '',
            'data'           => 'action',
            'name'           => 'action',
            'title'          => 'Action',
        ];

        $html = $builder->columns([
                ['data' => 'id', 'title' => 'Id'],
                ['data' => 'name', 'title' => 'Name'],
                ['data' => 'email', 'title' => 'Email'],
                ['data' => 'created_at', 'title' => 'Created At'],
                ['data' => 'updated_at', 'title' => 'Updated At'],
            ])
        ->addColumn ($column)
        ->addCheckbox(
            [
            'defaultContent' => '<input type="checkbox"/>',
            'title'          => 'Checkbox',
            'data'           => 'checkbox',
            'name'           => 'checkbox',
            'orderable'      => false,
            'searchable'     => false,
            'exportable'     => false,
            'printable'      => true,
            'width'          => '10px',
        ]
        )
        ->setTableId('admindatatable-table')
        ->parameters([
            'paging' => true,
            'searching' => true,
            'info' => false,
            'searchDelay' => 350,
            'dom'          => 'Bfrtip',
            'buttons'      => ['export', 'print', 'reset', 'reload'],
        ]);

        return view('admin.html', compact('html'));
        // return var_dump($html);
    });

});





// Route::resource('/testt', [App\Http\Controllers\AdminControllerR::class]);
Route::get('/view', function () {
    return view('admin.view.view');
});


Route::get('/go', function () {
    $posts = \App\Models\post::with(['user', 'tags'])->get();
    return view('go', compact('posts'));
});

Route::get('/go1', function () {
    $tags = \App\Models\tag::with('posts')->get();
    return view('go1', compact('tags'));
    // return compact('tags');
});

/*
Route::get('user-data', function() {
    $model = App\Models\User::query();

    return DataTables::of($model)->toJson();
});
*/
/*
Route::get('user-data', function() {
    $model =  App\Models\Admin::query();

    return DataTables2::eloquent($model)
                ->only(['id','name'])
                ->toJson();
});
*/


Route::get('/', function () {
    return view('dashboard.index');
});


Route::resource('movie', movieController::class);
