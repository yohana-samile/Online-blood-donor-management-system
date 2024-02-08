<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Role;
    use Illuminate\Http\JSonHttpResponse;

    class RoleController extends Controller{
        public function index(){
            $roles = DB::select("SELECT * FROM roles ORDER BY created_at desc");
            return view('roles/index', [
                'roles' => $roles,
            ]);
        }

        // roles/register_role
        public function register_role(Request $request){
            $validator = $request->validate([
                'role_name' =>'required'
            ]);
            $role_name = $request->input('role_name');
            Role::create([
                'role_name' => $role_name
            ]);
            return response()->json(['success' => '/roles/']);
        }

        // editRole
        public function edit_role(Request $request){
            $validator = $request->validate([
                'role_name' => 'required',
                'id' => 'required',
            ]);
            $role_name = $request->input('role_name');
            $id = $request->input('id');
            $update = DB::update("UPDATE roles set role_name = '$role_name' where id = '$id' ");
            if ($update) {
                return response()->json(['success' => 'roles/']);
            }
            else{
                return response()->json(['error' => 'roles/']);
            }
        }

        // delete_role
        public function delete_role(Request $request){
            $validator = $request->validate([
                'id' => 'required',
            ]);
            $id = $request->input('id');
            $update = DB::delete("DELETE from roles where id = '$id' ");
            if ($update) {
                return response()->json(['success' => '/roles/']);
            }
            else{
                return response()->json(['error' => '/roles/']);
            }
        }
    }

