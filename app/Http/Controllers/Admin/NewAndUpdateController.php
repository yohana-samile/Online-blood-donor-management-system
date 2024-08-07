<?php
    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use DB;
    use App\Models\New_and_update;
    use Illuminate\Http\JSonHttpResponse;

    class NewAndUpdateController extends Controller{
        public function index(){
            $get_news = DB::select("SELECT * FROM `new_and_updates` ");
            return view('news/index', [
                'get_news' => $get_news
            ]);
        }

        public function add_news_and_update(Request $request){
            $validate = $request->validate([
                'new_title' => 'required',
                'new_postacl_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'user_id' => 'required',
            ]);

            $new_title = $request->input('new_title');
            // change of image name to assgn in the current time
            $imageName = time().'.'.$request->new_postacl_card->extension();
            $request->new_postacl_card->move(public_path('image'), $imageName);
            $user_id = $request->input('user_id');
            New_and_update::create([
                'new_title' => $new_title,
                'new_postacl_card' => $imageName,
                'user_id' => $user_id,
            ]);
            return response()->json(['success' =>'/news/']);
        }

        // edit_news_and_update
        public function edit_news_and_update(Request $request){
            $validate = $request->validate([
                'new_title' => 'required',
                'id' => 'required',
            ]);
            $new_title = $request->input('new_title');
            $id = $request->input('id');
            $update = DB::update("update new_and_updates set new_title = '$new_title' where id = '$id' ");
            if ($update) {
                return response()->json(['success' =>'/news/']);
            }
            else{
                return response()->json(['error' =>'/news/']);
            }
        }

        // // delete_news_and_update
        public function delete_news_and_update(Request $request){
            $validate = $request->validate([
                'id' => 'required',
            ]);
            $id = $request->input('id');
            $update = DB::update("DELETE from new_and_updates where id = '$id' ");
            if ($update) {
                return response()->json(['success' =>'/news/']);
            }
            else{
                return response()->json(['error' =>'/news/']);
            }
        }

        // publish_new
        public function publish_new(Request $request){
            $validate = $request->validate([
                'id' => 'required'
            ]);
            $id = $request->input('id');
            $update = DB::update("UPDATE new_and_updates SET publish_status = 1 where id = '$id' ");
            if ($update) {
                return response()->json(['success' =>'/news/']);
            }
            else{
                return response()->json(['error' =>'/news/']);
            }
        }
    }
