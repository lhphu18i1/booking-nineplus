<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    public function showAddPosition()
    {
        return view('admin.position.add');
    }
    public function addPosition(PositionRequest $request)
    {
        $positions = Position::all()->where('name', $request->name)->first();
        if (!$positions) {
            $positions = new Position;
            $positions->fill($request->all())->save();
            return redirect()->route('position.index')->with('success', __('message.add_position_success'));
        } else {
            return redirect()->back()->with('failed', __('message.add_position_failed'));
        }
    }
    public function positionIndex()
    {
        $positions = Position::orderBy('id', 'desc')->paginate(4);
        return view('admin.position.index', compact('positions'));
    }
    public function searchPosition(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($search)) {
            $positions = Position::where('name', 'LIKE', "%$search%")->paginate(4);
        }
        return view('admin.position.index', compact('search', 'positions'));
    }
    public function showEditPosition($id)
    {
        $positions = Position::find($id);
        return view('admin.position.update', compact('positions'));
    }
    public function updatePosition(PositionRequest $request, $id)
    {
        $positions = Position::find($id);
        if (!empty($positions)) {
            $positions->name = $request->name;
            $positions->update();
            return redirect()->route('position.index')->with('success',  __('message.update_position_success'));
        } else {
            return redirect()->back()->with('failed',  __('message.update_position_failed'));
        }
    }
    public function deletePosition($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect()->route('position.index')->with('delete', __('message.delete_position_success'));
    }
}
