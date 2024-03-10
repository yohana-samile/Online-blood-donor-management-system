<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Profile;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use DB;

    class RegisterUserController extends Controller {
        public function index(){
            $usersWithProfile = User::with('profile')->get();
            $profiles = $usersWithProfile->pluck('profile');
            return view('/donar/index', compact('profiles'));
        }

        protected function register_new_donor(Request $request) {
            require_once(app_path().'/Http/userRegistrationFnct.php');
            if (userRegistrationFnct($request)) {
                return response()->json(["success" => '/donar/']);
            }
            else {
                return response()->json(["error" => '/donar/']);
            }
        }
    }
