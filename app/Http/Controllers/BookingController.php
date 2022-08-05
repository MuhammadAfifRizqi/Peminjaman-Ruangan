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
            $data = Booking::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('BookingController@accept', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Accept</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('BookingController@decline', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"'."onclick='return confirm()'".'>Decline</a>';
                    return $button;
                })->addColumn('user', function ($data) {
                    return User::find($data->id_users)->name;
                })->addColumn('room', function ($data) {
                    return Room::find($data->id_room)->room_number;
                })
                ->rawColumns(['action','user','room'])
                ->make(true);
        }

        return view('cms.booking.booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create_view()
    // {
    //     return view('cms.booking.create');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create_process(Request $request)
    // {
    //     $request->validate([
    //         'room_number' => 'required',
    //         'type' => 'required',
    //         'capacity' => 'required',
    //         'facility' => 'required',
    //     ]);

    //     $room = new Room();
    //     $room->room_number = $request->room_number;
    //     $room->type = $request->type;
    //     $room->capacity = $request->capacity;
    //     $room->facility = $request->facility;
    //     $room->status = "not_used";
    //     $room->save();

    //     return redirect()->route('room')->withSuccess('Room created successfully.');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function update_view($id)
    // {
    //     $data = Booking::find($id);
    //     return view('cms.booking.update', compact('data'));
    // }

    // public function update_process(Request $request, $id)
    // {
        // $request->validate([
        //     'room_number' => 'required',
        //     'type' => 'required',
        //     'capacity' => 'required',
        //     'facility' => 'required',
        // ]);

        // $room = Booking::find($id);
        // $room->room_number = $request->room_number;
        // $room->type = $request->type;
        // $room->capacity = $request->capacity;
        // $room->facility = $request->facility;
        // $room->save();

        // return redirect()->route('booking')->withSuccess('Booking updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('booking')->withSuccess('Booking deleted successfully.');
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
