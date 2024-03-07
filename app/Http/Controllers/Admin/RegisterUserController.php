<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Profile;

    class RegisterUserController extends Controller {
        public function index(){
            $usersWithProfile = User::with('profile')->get();
            $profiles = $usersWithProfile->pluck('profile');
            return view('/donar/index', compact('profiles'));
        }
    }
