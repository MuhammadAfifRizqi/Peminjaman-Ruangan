<?php

namespace App\Http\Controllers;

use App\Booking;
use App\User;
use App\Room;
use Illuminate\Http\Request;

use DataTables;

class BookingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with('user','room.building')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('BookingController@accept', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Accept</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('BookingController@decline', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"'."onclick='return confirm()'".'>Decline</a>';
                    return $button;
                })->addColumn('phone_number', function ($data) {
                    return $data->user->phone_number;
                })->addColumn('position', function ($data) {
                    return $data->user->position;
                })->addColumn('user_name', function ($data) {
                    return $data->user->name . " " . $data->user->last_name;
                })->addColumn('room_name', function ($data) {
                    return $data->room->room_number;
                })->addColumn('building', function ($data) {
                    return $data->room->building->name;
                })
                ->rawColumns(['action','position','user_name','room_name','building','phone_number'])
                ->make(true);
        }

        return view('cms.booking.booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view()
    {
        $users = User::all();
        $rooms = Room::all();
        return view('cms.booking.create', compact('users','rooms'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create_process(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'id_room' => 'required',
            'start_date' => 'required',
            'time' => 'required',
            'lecturer_code' => 'required',
        ]);

        $booking = new Booking();
        $booking->id_user = $request->id_user;
        $booking->id_room = $request->id_room;
        $booking->start_date = $request->start_date;
        $booking->time = $request->time;
        $booking->lecturer_code = $request->lecturer_code;
        $booking->status = "pending";
        $booking->save();

        return redirect()->route('booking')->withSuccess('Booking created successfully.');
    }

    public function accept($id)
    {
        $booking = Booking::find($id);
        $booking->status = "accept";
        $booking->save();

        return redirect()->route('booking')->withSuccess('Booking accepted!');
    }

    public function decline($id)
    {
        $booking = Booking::find($id);
        $booking->status = "decline";
        $booking->save();

        return redirect()->route('booking')->withSuccess('Booking declined!');
    }


}
