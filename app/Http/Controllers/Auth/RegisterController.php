<?php
    namespace App\Http\Controllers\Auth;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Models\Profile;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use DB;

    class RegisterController extends Controller {
        /*
        |--------------------------------------------------------------------------
        | Register Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles the registration of new users as well as their
        | validation and creation. By default this controller uses a trait to
        | provide this functionality without requiring any additional code.
        |
        */

        use RegistersUsers;

        /**
         * Where to redirect users after registration.
         *
         * @var string
         */
        protected $redirectTo = '/home';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct() {
            $this->middleware('guest');
        }

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        protected function validator(array $data) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\Models\User
         */

        //  fetch-districts
        public function fetchdistricts($regionId){
            try {
                $fetcheddistricts = DB::select("SELECT district FROM districts WHERE region = '$regionId'");
                return response()->json($fetcheddistricts);
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error fetching districts: ' . $e->getMessage());
                // Return an error response
                return response()->json(['error' => 'Failed to fetch districts.'], 500);
            }
        }
        // fetchwards
        public function fetchwards($districtId){
            $fetchedwards = DB::select("SELECT ward from wards where district = '$districtId' ");
            return response()->json($fetchedwards);
        }
        // fetchstreets
        public function fetchstreets($wardId){
            try {
                $fetchedstreets = DB::select("SELECT street from ward_streets_places where ward = '$wardId' ");
                return response()->json($fetchedstreets);
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error fetching streets: ' . $e->getMessage());
                // Return an error response
                return response()->json(['error' => 'Failed to fetch streets.'], 500);
            }
        }
        // fetchplaces
        public function fetchplaces($streetId){
            $fetchedplaces = DB::select("SELECT places from ward_streets_places where street = '$wardId' ");
            return response()->json($fetchedplaces);
        }
        // protected function create(array $data) {
            // return User::create([
                //     'name' => $data['name'],
                //     'email' => $data['email'],
                //     'password' => Hash::make($data[$password]),
                // ]);

        protected function registerMe(array $data) {
            // Create a user
            $password = rand(10000, 9999);
            $user = User::create([
                'name' => $data['regstrationFull_name'],
                'email' => $data['registrationEmail'],
                'password' => Hash::make($data[$password]),
            ]);

            // create profile for this user
            $profile = Profile::create([
                'region' => $data['region'],
                'role' => $data['role'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'street' => $data['street'],
                'gender' => $data['gender'],
                'phone_number' => $data['phoneNumber'],
            ]);
            $user->profile()->save($profile); // save it using the hasOne
            if ($user) {
                return response()->json(["success" => '/']);
            }
            else{
                return response()->json(["error" => '/']);
            }
        }
    }
