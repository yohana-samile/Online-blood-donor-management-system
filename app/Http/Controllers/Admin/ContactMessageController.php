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
            return view('contact-messages/');
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
    }
