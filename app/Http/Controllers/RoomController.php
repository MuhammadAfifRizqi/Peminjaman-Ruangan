<?php

namespace App\Http\Controllers;

use App\Room;
use App\Building;
use Illuminate\Http\Request;

use DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Room::with('building')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('RoomController@update_view', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('RoomController@delete', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"' . "onclick='return confirm()'" . '>Delete</a>';
                    return $button;
                })
                ->addColumn('building', function ($data) {
                    return $data->building->name;
                })
                ->rawColumns(['action','building'])
                ->make(true);
        }

        return view('cms.room.room');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view()
    {
        $building = Building::all();
        return view('cms.room.create', compact('building'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_process(Request $request)
    {
        $request->validate([
            'room_number' => 'required',
            'type' => 'required',
            'capacity' => 'required',
            'id_building' => 'required',
            'facility' => 'required',
        ]);

        $room = new Room();
        $room->room_number = $request->room_number;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->id_building = $request->id_building;
        $room->facility = $request->facility;
        $room->status = "not_used";
        $room->save();

        return redirect()->route('room')->withSuccess('Room created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_view($id)
    {
        $data = Room::find($id);
        $building = Building::all();
        return view('cms.room.update', compact('data', 'building'));
    }

    public function update_process(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required',
            'type' => 'required',
            'capacity' => 'required',
            'id_building' => 'required',
            'facility' => 'required',
        ]);

        $room = Room::find($id);
        $room->room_number = $request->room_number;
        $room->type = $request->type;
        $room->capacity = $request->capacity;
        $room->id_building = $request->id_building;
        $room->facility = $request->facility;
        $room->save();

        return redirect()->route('room')->withSuccess('Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->route('room')->withSuccess('Room deleted successfully.');
    }
}
