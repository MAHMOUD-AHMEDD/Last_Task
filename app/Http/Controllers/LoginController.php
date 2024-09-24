<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function save(LoginFormRequest $request)
    {
        $data=$request->validated();
//        dd($data);
        if(auth()->attempt($data)){
            $user=auth()->user();
            if($user->type=='admin'){
                return redirect()->to('admin/Home');
            }
            else{
//             dd($data);
                return redirect()->to('/');
            }
        }
        else{
            return redirect()->back()->withErrors(['error' => 'Email or password invalid']);
        }
    }
}
