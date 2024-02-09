<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\ForgotPasswordController;
    use App\Http\Controllers\Auth\ConfirmPasswordController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\Auth\VerificationController;
    use App\Http\Controllers\Admin\RegisterUserController;
    use App\Http\Controllers\Admin\BloodGroupController;
    use App\Http\Controllers\Admin\RoleController;
    use App\Http\Controllers\Admin\NewAndUpdateController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('index');
    });

    Route::controller(LoginController::class)->group(function(){
        Route::get('/auth/login', 'login');
        Route::post('Auth/login', [LoginController::class, 'login'])->name('Auth/login');
    });

    // authenticated routes
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // registration
    Route::controller(RegisterUserController::class)->group(function(){
        Route::get('/donar/index', 'index');
    })->middleware('auth');


    // blood
    Route::controller(BloodGroupController::class)->group(function(){
        Route::get('blood/', 'index');
        Route::post('/blood/register_blood_group', 'register_blood_group')->name('blood/register_blood_group');
        Route::post('/blood/editBloodGroup', 'editBloodGroup')->name('/blood/editBloodGroup');
        Route::post('/blood/delete_blood_group', 'delete_blood_group')->name('/blood/delete_blood_group');
    })->middleware('auth');

    // Role
    Route::controller(RoleController::class)->group(function(){
        Route::get('roles/', 'index');
        Route::post('/roles/register_role', 'register_role')->name('roles/register_role');
        Route::post('roles/edit_role', 'edit_role')->name('roles/edit_role');
        Route::post('/roles/delete_role', 'delete_role')->name('/roles/delete_role');
    })->middleware('auth');


    // news and update
    Route::controller(NewAndUpdateController::class)->group(function () {
        Route::get('news/', 'index');
        Route::post('/news/add_news_and_update', 'add_news_and_update')->name('/news/add_news_and_update');
        Route::post('/news/edit_news_and_update', 'edit_news_and_update')->name('/news/edit_news_and_update');
        Route::post('/news/delete_news_and_update', 'delete_news_and_update')->name('/news/delete_news_and_update');
    });
