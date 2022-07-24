<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\Models\Room;
use App\Models\Room_list;
use App\Models\Time;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(AdminCustomValidator $form)
    {
        $this->form = $form;
    }

    public function index(Request $request)
    {
        $room_lists = Room_list::all();
        $times = Time::all();
        $selectDate = $request->date ?? Carbon::now()->format('Y-m-d');
        return view('booking.home.index', compact('room_lists', 'selectDate', 'times'));
    }

    public function book($id, Request $request)
    {

        $date = $request->date;
        $room_list = Room_list::find($id);
        $times = Time::all();
        $rooms = Room::where('room_list_id', $id)->where('date', $date)->get();
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $this->form->validate($request, 'ValidateFormBooking');
            try {
                $position = Auth::user()->position;
                $checkBookings = Room::where('room_list_id', $id)->where('date', $date)->get();
                $check = true;
                if (count($checkBookings) >= 1)
                {
                    foreach ($checkBookings as $checkBooking) {
                        $time_start = Carbon::parse($checkBooking->time_start)->format('H:i');
                        // dd($request->all());
                        $time_end = Carbon::parse($checkBooking->time_end)->format('H:i');
                        if ((Carbon::parse($request->time_start)->gte(Carbon::parse($time_start)) && Carbon::parse($request->time_start)->gte(Carbon::parse($time_end))) || (Carbon::parse($request->time_end)->lte(Carbon::parse($time_start)) && Carbon::parse($request->time_end)->lte(Carbon::parse($time_end)))) {
                            $check = true;
                        } else {
                            $check = false;
                            break;
                        }
                    }
                }
                if ($check == true) {
                    if($position == 'Trưởng phòng' || $position == 'Giám đốc' || $position == 'Thư ký') {
                        $room = new Room;
                        $room->fill($request->all());
                        $room['user_id'] = Auth::user()->id;
                        if($room->save())
                        {
                            return redirect()->route('home.index', ['date' => date('Y-m-d') ]);
                        } else {
                            return redirect()->back()->with('fail', __('message.error_booking'));
                        }
                    } else {
                        return redirect()->back()->with('fail', __('message.error_book'));
                    }
                } else {
                    return redirect()->back()->with('fail', __('message.error_time'))->withInput($request->all());
                }

            } catch (\Throwable $th) {
                //throw $th;
                dd($th);
            }

        }
        return view('booking.home.book', compact('room_list', 'times', 'rooms', 'date'));
    }

    public function listBooking(Request $request)
    {
        $id = Auth::user()->id;
        $rooms = Room::where('user_id', $id);
        if ($request->date) {
            $rooms = $rooms->where('date', Carbon::parse($request->date)->format('Y-m-d'));
        }
        $rooms = $rooms->orderBy('id', 'desc')->paginate(10);
        return view('booking.home.list-booking', compact('rooms'));
    }
}
