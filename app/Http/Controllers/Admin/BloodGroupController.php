<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\JSonHttpResponse;
    use App\Models\Blood_group;
    use App\Models\Blood_donation_record;

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
            $delete = Blood_group::find($id)->delete($id);
            if ($delete) {
                return response()->json(['success' => '/blood/']);
            }
            else{
                return response()->json(['error' => '/blood/']);
            }
        }

        // blood-donation
        public function bloodDonation(){
            $donation_records = DB::select("SELECT users.name, blood_groups.bloodGroup, blood_donation_records.id, blood_donation_records.status, blood_donation_records.date_donate FROM users, blood_groups, blood_donation_records, profiles WHERE profiles.user_id = users.id AND profiles.blood_group_id = blood_groups.id AND blood_donation_records.user_id = users.id");
            $donators = DB::select("SELECT users.id, users.name FROM users where role_id != 2 ");
            return view ("/blood/blood-donation",
                [
                    'donators' => $donators,
                    'donation_records' => $donation_records
            ]);
        }

        // saveRecord
        public function saveRecord(Request $request){
            $validator = $request->validate([
                'donotorName' =>'required',
                'date_donate' =>'required'
            ]);
            $donotorName = $request->input('donotorName');
            $date_donate = $request->input('date_donate');
            Blood_donation_record::create([
                'user_id' => $donotorName,
                'date_donate' => $date_donate
            ]);
            return response()->json(['success' => '/blood/blood-donation']);
        }
        // updateSavedRecord
        public function updateSavedRecord(Request $request){
            $validator = $request->validate([
                'id' =>'required',
            ]);
            $id = $request->input('id');
            DB::update(" update blood_donation_records set status = 'used' where id = '$id' ");
            return response()->json(['success' => '/blood/blood-donation']);
        }
    }
