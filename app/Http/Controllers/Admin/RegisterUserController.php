<?php

    namespace App\Http\Controllers\Admin;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class RegisterUserController extends Controller {
        public function index(){
            return view('/donar/index');
        }
    }
