<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room_list;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showAddRoom()
    {
        return view('admin.room.add');
    }
    public function addRoom(RoomRequest $request)
    {
        $rooms = Room_list::all()->where('name', $request->name)->first();
        if (!$rooms) {
            $rooms = new Room_list;
            $rooms->fill($request->all())->save();
            return redirect()->route('room.index')->with('success', __('message.add_room_success'));
        } else {
            return redirect()->back()->with('failed', __('message.add_room_failed'));
        }
    }
    public function roomIndex(Request $request)
    {
        $rooms = Room_list::orderBy('id', 'desc')->paginate(4);
        return view('admin.room.index', compact('rooms'));
    }
    public function searchRoom(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($search)) {
            $rooms = Room_list::where('name', 'LIKE', "%$search%")->paginate(4);
        }
        return view('admin.room.index', compact('search', 'rooms'));
    }
    public function showEditRoom($id)
    {
        $rooms = Room_list::find($id);
        return view('admin.room.update', compact('rooms'));
    }
    public function updateRoom(RoomRequest $request, $id)
    {
        $rooms = Room_list::find($id);
        if (!empty($rooms)) {
            $rooms->fill($request->all())->update();
            return redirect()->route('room.index')->with('success', __('message.update_room_success'));
        } else {
            return redirect()->back()->with('failed', __('message.update_room_failed'));
        }
    }
    public function deleteRoom($id)
    {
        $rooms = Room_list::find($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('delete', __('message.delete_room_success'));
    }
}
