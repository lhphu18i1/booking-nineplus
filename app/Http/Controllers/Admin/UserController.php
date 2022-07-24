<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAddUser()
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.user.add', compact('positions', 'departments'));
    }
    public function addUser(UserRequest $request)
    {

        $request->merge(['password' => Hash::make($request->input('password'))]);
        $users = User::all()->where('email', $request->email)->first();
        if (!$users) {
            $users = new User;
            $users->fill($request->all())->save();
            return redirect()->route('user.index')->with('success', __('message.add_user_success'));
        } else {
            return redirect()->back()->with('failed', __('message.add_user_failed'));
        }
    }
    public function userIndex(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(4);
        return view('admin.user.index', compact('users'));
    }
    public function searchUser(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($search)) {
            $users = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "$search")
                ->orWhere('gender', 'LIKE', "$search")
                ->orWhere('position', 'LIKE', "%$search%")
                ->orWhere('department', 'LIKE', "%$search%")
                ->paginate(4);
        }
        return view('admin.user.index', compact('search', 'users'));
    }
    public function showEditUser($id)
    {
        $users = User::find($id);
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.user.update', compact('users', 'positions', 'departments'));
    }
    public function updateUser(UserRequest $request, $id)
    {
        // dd($request->all());
        // $users = User::all()->where('email', $request->email);
        $users = User::find($id);
        if (!empty($users)) {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $users->fill($request->all())->update();
            return redirect()->route('user.index')->with('success', __('message.update_user_success'));
        } else {
            return redirect()->back()->with('failed', __('message.update_user_failed'));
        }
    }
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('user.index')->with('delete', __('message.delete_user_success'));
    }
}
