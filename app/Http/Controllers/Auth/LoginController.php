<?php
    namespace App\Http\Controllers\Auth;
    use App\Http\Controllers\Controller;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Validator;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\JsonHttpResponse;
    // use Illuminate\Http\JsonHttpResponse;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use App\Models\New_and_update;

    class LoginController extends Controller {
        /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */

        use AuthenticatesUsers;

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = '/home';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct() {
            $this->middleware('guest')->except('logout');
        }

        public function login(Request $request){
            $validator = $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where(['email' => $email])->first();

            if($user && Hash::check($password, $user->password)){
                if (Auth::login($user)) {
                    $request->session()->regenerate();
                }
                return response()->json(['success' => 'home']);
            }
            else{
                return response()->json('error');
            }
        }

        public function index() {
            return view('index');
        }
    }
