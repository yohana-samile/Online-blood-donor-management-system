<?php
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use App\Models\User;
    use App\Models\Profile;
    use Illuminate\Http\Request;


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
            // return response()->json(["success" => '/donar/']);
            die(curl_error($ch));
        }
        // Display the response
        var_dump($response);

        // Close cURL
        curl_close($ch);
    }
    // else{
    //     return response()->json(["error" => '/donar/']);
    // }
