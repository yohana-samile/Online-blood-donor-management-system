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
    use App\Http\Controllers\Admin\ContactMessageController;
    use App\Http\Controllers\Admin\ResidenceController;
    use App\Http\Controllers\Admin\SmSNotificationController;
    use App\Http\Controllers\Admin\HospitalController;

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

    Route::post('sendPost', [ContactMessageController::class, 'sendPost']);

    Route::controller(LoginController::class)->group(function(){
        Route::get('/auth/login', 'login');
        Route::post('Auth/login', [LoginController::class, 'login'])->name('Auth/login');
    });

    Route::controller(RegisterController::class)->group(function (){
        Route::post('Auth/registerMe', 'registerMe')->name('Auth/registerMe');
        Route::get('fetchdistricts/{regionId}', 'fetchdistricts')->name('fetchdistricts');
        Route::get('fetchwards/{districtId}', 'fetchwards')->name('fetchwards');
        Route::get('fetchstreets/{wardId}', 'fetchstreets')->name('fetchstreets');
        Route::get('fetchplaces/{streetId}', 'fetchplaces')->name('fetchplaces');
    });

    // authenticated routes
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //donar registration
    Route::controller(RegisterUserController::class)->group(function(){
        Route::get('/donar', 'index');
        Route::post('/donar/register_new_donor', 'register_new_donor')->name('/donar/register_new_donor');
    })->middleware('auth');

    // blood
    Route::controller(BloodGroupController::class)->group(function(){
        Route::get('blood/', 'index');
        Route::post('/blood/register_blood_group', 'register_blood_group')->name('blood/register_blood_group');
        Route::post('/blood/editBloodGroup', 'editBloodGroup')->name('/blood/editBloodGroup');
        Route::delete('/blood/delete_blood_group/{id}', 'delete_blood_group');
        Route::get('/blood/blood-donation', 'bloodDonation');
        Route::post('/blood/saveRecord', 'saveRecord')->name('/blood/saveRecord');
        Route::post('/blood/updateSavedRecord', 'updateSavedRecord')->name('/blood/updateSavedRecord');
        // blood request for hospital only
        Route::get('/blood/blood-request', 'bloodRequest');
        Route::post('/blood/sendBloodRequest', 'sendBloodRequest')->name('/blood/sendBloodRequest');
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
        Route::post('/news/publish_new', 'publish_new')->name('/news/publish_new');
    })->middleware('auth');

    // contact-messages
    Route::controller(ContactMessageController::class)->group(function () {
        Route::get('contact-messages/', 'index');
        Route::delete('/contact-messages/delete_user_query/{id}', 'delete_user_query')->name('/contact-messages/delete_user_query');
        Route::post('/contact-messages/send_sms_replay', 'send_sms_replay')->name('/contact-messages/send_sms_replay');
    })->middleware('auth');

    // sms notifications
    Route::controller(SmSNotificationController::class)->group(function (){
        Route::post('/donar/sendNotification', 'sendNotification')->name('/donar/sendNotification');
        Route::get('fetchdistricts/{regionId}', 'fetchdistricts')->name('fetchdistricts');
        Route::get('fetchwards/{districtId}', 'fetchwards')->name('fetchwards');
        Route::get('fetchstreets/{wardId}', 'fetchstreets')->name('fetchstreets');
        Route::get('fetchplaces/{streetId}', 'fetchplaces')->name('fetchplaces');
    })->middleware('auth');

    // residence-locations
    Route::controller(ResidenceController::class)->group(function (){
        Route::get('residence-locations/', 'index');
        Route::post('/residence-locations/uploadLocation', 'uploadLocation')->name('/residence-locations/uploadLocation');
        Route::post('/residence-locations/uploadDistrict', 'uploadDistrict')->name('/residence-locations/uploadDistrict');
        Route::post('/residence-locations/uploadRegions', 'uploadRegions')->name('/residence-locations/uploadRegions');
        Route::post('/residence-locations/uploadWard', 'uploadWard')->name('/residence-locations/uploadWard');
        Route::post('/residence-locations/uploadward_streets_places', 'uploadward_streets_places')->name('/residence-locations/uploadward_streets_places');
    })->middleware('auth');

    // HospitalController
    Route::controller(HospitalController::class)->group( function (){
        route::get('hospital/', 'index');
        route::post('/hospital/registerHospital', 'registerHospital')->name('/hospital/registerHospital');
    });
