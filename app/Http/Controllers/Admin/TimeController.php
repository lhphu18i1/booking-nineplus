<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Http\Requests\TimeRequest;
use Illuminate\Http\Request;

class timeController extends Controller
{
    public function showAddTime()
    {
        return view('admin.time.add');
    }
    public function addtime(TimeRequest $request)
    {
        $times = Time::all()->where('time', $request->time)->first();;
        if (!$times) {
            $times = new Time;
            $times->fill($request->all())->save();
            return redirect()->route('time.index')->with('success', __('message.add_time_success'));
        } else {
            return redirect()->back()->with('failed', __('message.add_time_failed'));
        }
    }
    public function timeIndex(Request $request)
    {
        $times = Time::orderBy('id', 'desc')->paginate(4);
        return view('admin.time.index', compact('times'));
    }
    public function searchTime(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($search)) {
            $times = Time::where('time', 'LIKE', "%$search%")->paginate(4);
        }
        return view('admin.time.index', compact('search', 'times'));
    }
    public function showEditTime($id)
    {
        $times = Time::find($id);
        return view('admin.time.update', compact('times'));
    }
    public function updateTime(TimeRequest $request, $id)
    {
        $times = Time::find($id);
        if (!empty($times)) {
            $times->fill($request->all())->update();
            return redirect()->route('time.index')->with('success', __('message.update_time_success'));
        } else {
            return redirect()->back()->with('failed', __('message.update_time_failed'));
        }
    }
    public function deleteTime($id)
    {
        $times = Time::find($id);
        $times->delete();
        return redirect()->route('time.index')->with('delete', __('message.delete_time_success'));
    }
}
