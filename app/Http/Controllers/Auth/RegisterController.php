<?php
    namespace App\Http\Controllers\Auth;
    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Models\Profile;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use DB;
    use Illuminate\Http\Request;

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

        protected function registerMe(Request $request) {
            // Create a user
            $data = $request->all();
            $password = random_int(1000, 10000);
            $user = User::create([
                'name' => $data['regstrationFull_name'],
                'email' => $data['registrationEmail'],
                'role_id' => 1,
                'password' => Hash::make($password),
            ]);

            // create profile for this user
            $profile = new Profile();
            $profile->region = $data['region'];
            $profile->district = $data['district'];
            $profile->ward = $data['ward'];
            $profile->street = $data['street'];
            $profile->places = $data['places'];
            $profile->gender = $data['gender'];
            $profile->phone_number = $data['phoneNumber'];
            $profile->blood_group_id = $data['blood_group'];
            $user->Profile()->save($profile); // save it using the hasOne
            // send username and password to registered user
            if ($user) {
                //…. Api url
                $Url ='https://apisms.beem.africa/v1/send';

                $api_key= '643449c5b429a174';
                $secret_key = 'NWUxODBhMjkzYjg3NDc0YWIwNzFhZWE4ZGI1NzFhNzA5ZjIwM2E4NzJjYTcxM2QzMzJjOGE5ZDQyODhjMzg3ZA==';

                // Function to generate a random ID
                function randomId($randomInt) {
                    return $randomInt;
                }

                // Generate a random ID
                $randomInt = random_int(1000, 100000);
                $id = randomId($randomInt);

                // Destination phone number
                // $phone_number = 745668527;
                $phone_number = $profile->phone_number;
                $dest_addr = '255' . $phone_number;

                // Request payload
                $postData = array(
                    'source_addr' => 'INFO',
                    'encoding' => 0,
                    'schedule_time' => '',
                    'message' => 'use your email as username and' .' '. 'password is' . ' '. $password,
                    'recipients' => array(
                        array('recipient_id' => $id, 'dest_addr' => $dest_addr)
                    )
                );

                // Setup cURL
                $ch = curl_init($Url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: Basic ' . base64_encode($api_key . ':' . $secret_key),
                    'Content-Type: application/json'
                ));
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

                // Send the request
                $response = curl_exec($ch);

                // Check for errors
                if ($response === FALSE) {
                    return response()->json(["success" => '/']);
                    die(curl_error($ch));
                }
                // Display the response
                var_dump($response);

                // Close cURL
                curl_close($ch);
            }
            else{
                return response()->json(["error" => '/']);
            }
        }
    }
