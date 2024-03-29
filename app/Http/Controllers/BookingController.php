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
        return view('cms.booking.booking');
    }

    public function index_pending(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with('user', 'room.building')->where('status', 'pending')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('BookingController@accept', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Accept</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('BookingController@decline', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"' . "onclick='return confirm()'" . '>Decline</a>';
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
                ->rawColumns(['action', 'position', 'user_name', 'room_name', 'building', 'phone_number'])
                ->make(true);
        }
    }

    public function index_accept(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with('user', 'room.building')->where('status', 'accept')->latest()->get();
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
                ->rawColumns(['action', 'position', 'user_name', 'room_name', 'building', 'phone_number'])
                ->make(true);
        }
    }

    public function index_denied(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::with('user', 'room.building')->where('status', 'decline')->latest()->get();
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
                ->rawColumns(['action', 'position', 'user_name', 'room_name', 'building', 'phone_number'])
                ->make(true);
        }
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
        return view('cms.booking.create', compact('users', 'rooms'));
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
            'date' => 'required',
            'time' => 'required',
            'lecturer_code' => 'required',
            'used' => 'required',
        ]);

        $booking = new Booking();
        $booking->id_user = $request->id_user;
        $booking->id_room = $request->id_room;
        $booking->id_building = Room::with('building')->find($request->id_room)->building->id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->lecturer_code = $request->lecturer_code;
        $booking->used = $request->used;
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
