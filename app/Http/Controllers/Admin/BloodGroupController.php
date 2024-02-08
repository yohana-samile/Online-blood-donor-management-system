<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonHttpResponse;
    use App\Models\Blood_group;

    class BloodGroupController extends Controller {
        public function index(){
            $blood_groups = DB::select("SELECT * FROM blood_groups ORDER BY created_at desc");
            return view('/blood/index', [
                'blood_groups' => $blood_groups,
            ]);
        }

        // blood/register_blood_group
        public function register_blood_group(Request $request){
            $validator = $request->validate([
                'bloodGroup' =>'required'
            ]);
            $bloodGroup = $request->input('bloodGroup');
            Blood_group::create([
                'bloodGroup' => $bloodGroup
            ]);
            return response()->json(['success' => '/blood/']);
        }

        // edit_blood_group
        public function editBloodGroup(Request $request){
            $validator = $request->validate([
                'bloodGroup' => 'required',
                'id' => 'required',
            ]);
            $bloodGroup = $request->input('bloodGroup');
            $id = $request->input('id');
            $update = DB::update("UPDATE blood_groups set bloodGroup = '$bloodGroup' where id = '$id' ");
            if ($update) {
                return response()->json(['success' => '/blood/']);
            }
            else{
                return response()->json(['error' => '/blood/']);
            }
        }


        // delete_blood_group
        public function delete_blood_group(Request $request){
            $validator = $request->validate([
                'id' => 'required',
            ]);
            $id = $request->input('id');
            $update = DB::delete("DELETE from blood_groups where id = '$id' ");
            if ($update) {
                return response()->json(['success' => '/blood/']);
            }
            else{
                return response()->json(['error' => '/blood/']);
            }
        }
    }
