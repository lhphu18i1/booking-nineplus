<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function showAddBooking()
    {
        return view('admin.booking.add');
    }
    public function addBooking(BookingRequest $request)
    {
        $bookings = new Room;
        $bookings->fill($request->all())->save();
        return redirect()->back()->with('success', __('message.add_book_success'));
    }

    // public function editBooking($id, Request $request)
    // {
    //     $bookings = Booking::find($id);
    //     if($request->isMethod('post')){
    //         $bookings = new Booking();
    //         $bookings->fill($request->all());
    //         if($bookings->save()){
    //             return redirect()->route('admin.index');
    //         } else {
    //             return redirect()->back();
    //         }
    //     }
    //     return view('admin.Booking.index', compact('Bookings'));
    // }
    public function bookingIndex()
    {
        $bookings = Room::orderBy('id', 'desc')->paginate(4);
        return view('admin.booking.index', compact('bookings'));
    }
    public function searchBooking(Request $request)
    {
        $search = $request['search'] ?? "";
        if (!empty($request)) {
            $bookings = Room::where('title', 'LIKE', "%$search%")
                ->orWhere('date', 'LIKE', "$search")
                ->paginate(4);
        }
        return view('admin.booking.index', compact('search', 'bookings'));
    }
    public function showEditBooking($id)
    {
        $bookings = Room::find($id);
        return view('admin.booking.update', compact('bookings'));
    }
    public function updateBooking(BookingRequest $request, $id)
    {
        $bookings = Room::find($id);
        if (!empty($bookings)) {
        $bookings->fill($request->all())->update();
        return redirect()->route('booking.index')->with('success', __('message.update_book_success'));
        }else{
            return redirect()->back()->with('failed', __('message.update_book_failed'));
        }
    }
    public function deleteBooking($id)
    {
        $bookings = Room::find($id);
        $bookings->delete();
        return redirect()->route('booking.index')->with('delete', __('message.delete_book_success'));
    }
}
