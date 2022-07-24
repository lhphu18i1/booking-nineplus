<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginAdmin()
    {
        return view('admin.login');
    }
    public function loginAdmin(Request $request)
    {
        if($request->isMethod('post'))
        {
            $check = $request->only('email', 'password');
            if (Auth::attempt($check)) {
                return redirect()->route('get.admin.index');
            } else {
                return redirect()->back()->withInput();
            }
        }
    }
    public function showAddUser()
    {
        return view('admin.user.add');
    }
    public function addAdmin(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if(!$user) {
            $newUser = new Admin();
            $newUser->name = $request->name;
            $newUser->password = bcrypt($request->password);
            $newUser->email = $request->email;
            $newUser->save();
            return redirect()->route('get.admin.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
    public function adminIndex()
    {
        $admin = Admin::all();
        $data = compact('admin');
        return view('admin.user.index')->with($data);
    }
    public function showEditUser($id)
    {
        $admin = Admin::find($id);
        return view('admin.user.edit', compact('admin'));
    }
    public function EditUser(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->password = bcrypt($request->password);
        $admin->email = $request->email;
        $admin->update();
        return redirect()->route('get.admin.index');
    }
    public function deleteUser($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('get.admin.index');
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }
}
