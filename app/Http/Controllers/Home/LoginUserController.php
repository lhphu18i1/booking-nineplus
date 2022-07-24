<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{

    public function __construct( AdminCustomValidator $form)
    {
        $this->form = $form;
    }
    
    public function loginUser(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->form->validate($request, 'ValidateFormLogin');
            $loginUser = $request->only('email', 'password');
            if(Auth::attempt($loginUser, $request->remember))
            {
                return redirect()->route('home.index');
            } else {
                return redirect()->route('login')->with('fail', __('message.error_email_pass'));
            }
        }
        return view('booking.login.login');
    }
    public function logoutUser(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
