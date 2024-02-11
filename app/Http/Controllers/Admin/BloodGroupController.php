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
                'bloodGroup' =>'required',
                'bloodGroupInfo' =>'required'
            ]);
            $bloodGroup = $request->input('bloodGroup');
            $bloodGroupInfo = $request->input('bloodGroupInfo');
            Blood_group::create([
                'bloodGroup' => $bloodGroup,
                'bloodGroupInfo' => $bloodGroupInfo
            ]);
            return response()->json(['success' => '/blood/']);
        }

        // edit_blood_group
        public function editBloodGroup(Request $request){
            $validator = $request->validate([
                'bloodGroup' => 'required',
                'bloodGroupInfo' => 'required',
                'id' => 'required',
            ]);
            $bloodGroup = $request->input('bloodGroup');
            $bloodGroupInfo = $request->input('bloodGroupInfo');
            $id = $request->input('id');
            $update = DB::table('blood_groups')
                ->where('id', $id)
                ->update([
                    'bloodGroup' => $bloodGroup,
                    'bloodGroupInfo' => $bloodGroupInfo
                ]);
                // $update = DB::update("UPDATE blood_groups set bloodGroup = '$bloodGroup', bloodGroupInfo = '$bloodGroupInfo' where id = '$id' ");

            if ($update) {
                return response()->json(['success' => '/blood/']);
            }
            else{
                return response()->json(['error' => '/blood/']);
            }
        }


        // delete_blood_group
        public function delete_blood_group($id){
            // $validator = $request->validate([
            //     'id' => 'required',
            // ]);
            // $id = $request->input('id');
            $item = Blood_group::find($id)->delete($id);
            // $update = DB::delete("DELETE from blood_groups where id = '$id' ");
            if ($item) {
                return response()->json(['success' => '/blood/']);
            }
            else{
                return response()->json(['error' => '/blood/']);
            }
        }
    }
