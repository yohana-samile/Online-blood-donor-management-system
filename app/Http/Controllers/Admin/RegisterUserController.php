<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Profile;
    use App\Models\Blood_group;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use DB;
    use Auth;

    class RegisterUserController extends Controller {
        public function index(){
            // $usersWithProfile = User::with('profile')->get();
            // $profiles = $usersWithProfile->pluck('profile');
            $profiles = DB::select("SELECT * FROM users, profiles, blood_groups WHERE profiles.user_id = users.id AND profiles.blood_group_id = blood_groups.id ");
            return view('/donar/index', compact('profiles'));
        }

        public function register_donor(){
            return view('donar/register_donor');
        }

        // register_new_donor
        protected function register_new_donor(Request $request) {
            require_once(app_path().'/Http/userRegistrationFnct.php');
            if (userRegistrationFnct($request)) {
                return response()->json(["success" => '/donar/']);
            }
            else {
                return response()->json(["error" => '/donar/']);
            }
        }

        // profile
        public function profile(){
            $user = Auth::user()->id;
            $my_profile = User::with('profile.Blood_group')->find($user);
            return view('/donar/profile', compact('my_profile'));
        }

        // update profile
        public function updateResidence(Request $request){
            $validator = $request->validate([
                'id' =>'required',
                'region' =>'required',
                'district' =>'required',
                'ward' =>'required',
                'street' =>'required',
                'places' =>'required',
            ]);
            $id = $request->input('id');
            $region = $request->input('region');
            $district = $request->input('district');
            $ward = $request->input('ward');
            $street = $request->input('street');
            $places = $request->input('places');
            DB::update(" update profiles set region = '$region', district = '$district', ward = '$ward', street = '$street', places = '$places' where id = '$id' ");
            return response()->json(['success' => '/donar/profile']);
        }
    }
