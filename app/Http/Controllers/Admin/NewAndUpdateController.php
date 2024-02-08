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
    }
