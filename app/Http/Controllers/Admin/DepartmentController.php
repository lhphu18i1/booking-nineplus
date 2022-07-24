<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function showAddDepartment()
    {
        return view('admin.department.add');
    }
    public function addDepartment(DepartmentRequest $request)
    {
        $departments = Department::all()->where('name', $request->name)->first();
        if (!$departments) {
            $departments = new Department;
            $departments->fill($request->all())->save();
            return redirect()->route('department.index')->with('success', __('message.add_department_success'));
        } else {
            return redirect()->back()->with('failed', __('message.add_department_failed'));
        }
    }
    public function departmentIndex()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(4);
        return view('admin.department.index', compact('departments'));
    }
    public function searchDepartment(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($search)) {
            $departments = Department::where('name', 'LIKE', "%$search%")->paginate();
        }
        return view('admin.department.index', compact('search', 'departments'));
    }
    public function showEditDepartment($id)
    {
        $departments = Department::find($id);
        return view('admin.department.update', compact('departments'));
    }
    public function updateDepartment(DepartmentRequest $request, $id)
    {
        $departments = Department::find($id);
        if (!empty($departments)) {
            $departments->fill($request->all())->update();
            return redirect()->route('department.index')->with('success', __('message.update_department_success'));
        } else {
            return redirect()->back()->with('failed', __('message.update_department_failed'));
        }
    }
    public function deleteDepartment($id)
    {
        $departments = Department::find($id);
        $departments->delete();
        return redirect()->route('department.index')->with('delete', __('message.delete_department_success'));
    }
}
