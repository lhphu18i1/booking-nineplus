<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $this->form->validate($request, 'ValidateFormLoginAdmin');
            $login = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($login, $request->remember))
            {
                return redirect()->route('user.index');
            } else {
                return redirect()->route('admin.login')->with('fail', __('message.error_email_pass'));
            }
        }
        return view('admin.login.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
