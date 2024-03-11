<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Donor_notification;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonHttpResponse;

    class SmSNotificationController extends Controller {
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

        public function sendNotification(Request $request){
            $validateData = $request->validate([
                'region_to_be_conducted'=>'required',
                'district_to_be_conducted'=>'required',
                'ward_to_be_conducted'=>'required',
                'street_to_be_conducted'=>'required',
                'time_to_be_conducted'=>'required',
                'sms_notification'=>'required',
            ]);

            $data = $request->all();

            $send_notification = Donor_notification::create([
                'region_to_be_conducted' => $data['region_to_be_conducted'],
                'district_to_be_conducted' => $data['district_to_be_conducted'],
                'ward_to_be_conducted' => $data['ward_to_be_conducted'],
                'street_to_be_conducted' => $data['street_to_be_conducted'],
                'time_to_be_conducted' => $data['time_to_be_conducted'],
                'sms_notification' => $data['sms_notification'],
            ]);

            if ($send_notification) {

                // get all donaros phone number into array
                $membersPhoneNumber = DB::table('profiles')->pluck('phone_number')->toArray();

                //…. Api url
                $Url ='https://apisms.beem.africa/v1/send';

                $api_key= '643449c5b429a174';
                $secret_key = 'NWUxODBhMjkzYjg3NDc0YWIwNzFhZWE4ZGI1NzFhNzA5ZjIwM2E4NzJjYTcxM2QzMzJjOGE5ZDQyODhjMzg3ZA==';

                // Function to generate a random ID
                function randomId($randomInt) {
                    return $randomInt;
                }

                // Generate a random ID
                $randomInt = random_int(12001, 1000000);
                $id = randomId($randomInt);

                // message to be sent
                $message = "Region:" . $data['region_to_be_conducted'] . "\n" .
                    "District:" . $data['district_to_be_conducted'] . "\n" .
                    "Ward:" . $data['ward_to_be_conducted'] . "\n" .
                    "Date Time:" . $data['time_to_be_conducted'] . "\n" .
                    "Info:" . $data['sms_notification'];

                // Request payload
                $postData = array(
                    'source_addr' => 'INFO',
                    'encoding' => 0,
                    'schedule_time' => '',
                    'message' => $message,
                    'recipients' => []
                );

                foreach ($membersPhoneNumber as $phone_number){
                    // Destination phone number
                    $dest_addr = '255' . $phone_number;
                    $postData['recipients'][] = array('recipient_id' => $id, 'dest_addr' => $dest_addr);
                }

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
                    // echo $response;
                    return response()->json(['error' => '/donar/']);
                    die(curl_error($ch));
                }
                else{
                    // var_dump($response);
                    // Close cURL
                    curl_close($ch);
                    return response()->json(['success' => '/donar/']);
                }

            }
        }
    }

