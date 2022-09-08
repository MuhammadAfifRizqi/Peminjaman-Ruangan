<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Building;
use App\User;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DataTables;

class StudentBookingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with('user','room.building')->where('id_user', Auth::user()->id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('phone_number', function ($data) {
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
                ->rawColumns(['position','user_name','room_name','building','phone_number'])
                ->make(true);
        }

        return view('student.booking.booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view($id)
    {
        $rooms = Room::where('id_building', $id)->get();
        return view('student.booking.create', compact('rooms'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create_process(Request $request)
    {
        $request->validate([
            'id_room' => 'required',
            'date' => 'required',
            'time' => 'required',
            'lecturer_code' => 'required',
            'used' => 'required',
        ]);

        $booking = new Booking();
        $booking->id_user = Auth::user()->id;
        $booking->id_room = $request->id_room;
        $booking->id_building = Room::with('building')->find($request->id_room)->building->id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->lecturer_code = $request->lecturer_code;
        $booking->used = $request->used;
        $booking->status = "pending";
        $booking->save();

        return redirect()->route('history')->withSuccess('Booking created successfully.');
    }

}


