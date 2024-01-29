<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\ForgotPasswordController;
    use App\Http\Controllers\Auth\ConfirmPasswordController;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\Auth\VerificationController;
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
    Route::get('/auth/login', [LoginController::class, 'login'])->name('login');
    // Route::post('login', [LoginController::class, 'login'])->name('login');

    // authenticated routes
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
