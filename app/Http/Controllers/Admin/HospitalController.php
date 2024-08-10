<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Profile;
    use App\Models\Hospital;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\JSonHttpResponse;
    use DB;


    class HospitalController extends Controller {
        public function index(){
            // $usersWithProfile = User::with('Hospital')->get();
            // $hospitalRecord = $usersWithProfile->pluck('Hospital');
            $hospitalRecord = DB::select("SELECT * FROM users, hospitals WHERE hospitals.user_id = users.id ");
            return view('/hospital/index', compact('hospitalRecord'));
        }

        // register hospital
        public function registerHospital(Request $request){
            $data = $request->all();
            $password = random_int(2000, 20000);
            $user = User::create([
                'name' => $data['hospitalFull_name'],
                'email' => $data['hospitalEmail'],
                'role_id' => 2,
                'password' => Hash::make($password),
            ]);

            // create profile for this user
            $hospital = new Hospital();
            $hospital->region = $data['region'];
            $hospital->district = $data['district'];
            $hospital->ward = $data['ward'];
            $hospital->address = $data['address'];
            $hospital->phone_number = $data['hospitalphoneNumber'];
            $user->Hospital()->save($hospital); // save it using the hasOne
            // send username and password to registered user


            if ($user) {
                //…. Api url
                $Url ='https://apisms.beem.africa/v1/send';

                $api_key= ' ';
                $secret_key = ' ==';

                // Function to generate a random ID
                function randomId($randomInt) {
                    return $randomInt;
                }

                // Generate a random ID
                $randomInt = random_int(2000, 200000);
                $id = randomId($randomInt);

                // Destination phone number
                // $phone_number = 745668527;
                $phone_number = $hospital->phone_number;
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
                    return response()->json(["success" => '/hospital/']);
                    die(curl_error($ch));
                }
                // Display the response
                var_dump($response);

                // Close cURL
                curl_close($ch);
            }
            else{
                return response()->json(["error" => '/hospital/']);
            }
        }
    }

