<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\ContactMessage;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonHttpResponse;

    class ContactMessageController extends Controller {
        public function index (){
            $get_user_query = DB::select("SELECT * FROM contact_messages order by created_at desc");
            return view('contact-messages/index', compact('get_user_query'));
        }

        public function sendPost(Request $request){
            $validate = $request->validate([
                'full_name' => 'required',
                'phone_number' => 'required',
                'message' => 'required',
            ]);

            $insert = ContactMessage::create($validate);
            if ($insert) {
                return response()->json('success');
            }
        }

        // delete query
        public function delete_user_query($id){
            $delete = ContactMessage::find($id)->delete($id);
            if ($delete) {
                return response()->json(['success' => 'contact-messages/'] );
            }
            else{
                return response()->json(['error' => 'contact-messages/'] );
            }
        }

        // send_replay
        public function send_sms_replay(Request $request){
            $validatedData = $request->validate([
                'id' => 'required',
                'user_phone' => 'required',
                'message_replay' => 'required'
            ]);
            $id = $validatedData['id'];
            $user_phone = $validatedData['user_phone'];
            $message_replay = $validatedData['message_replay'];
            $update_status = DB::update("update contact_messages set message_status = 1 where id  = '$id' ");

            // send normal text
            if ($update_status) {
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
                $phone_number = $user_phone;
                $dest_addr = '255' . $phone_number;

                // Request payload
                $postData = array(
                    'source_addr' => 'INFO',
                    'encoding' => 0,
                    'schedule_time' => '',
                    'message' => $message_replay . ' ' . PHP_EOL. 'Repled From Online Blood Donors System,',
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
                    // echo $response;
                    return response()->json(['success' => '/contact-messages/']);
                    die(curl_error($ch));
                }

                // Display the response
                var_dump($response);

                // Close cURL
                curl_close($ch);
            }
            else{
                return response()->json(['error' => '/contact-messages/']);
            }
        }
    }
