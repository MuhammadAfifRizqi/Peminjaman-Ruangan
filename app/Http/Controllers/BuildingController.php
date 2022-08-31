<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use DataTables;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Building::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . action('BuildingController@update_view', $data->id) . '" type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<a href="' . action('BuildingController@delete', $data->id) . '" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"'."onclick='return confirm()'".'>Delete</a>';
                    return $button;
                })
                ->addColumn('photo', function ($data) {
                    $url = asset('storage/' . $data->image);
                    return '<img src="' . $url . '" alt="foto" class="img-fluid" width="250" />';
                })
                ->rawColumns(['action','photo'])
                ->make(true);
        }

        return view('cms.building.building');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view()
    {
        return view('cms.building.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required', 'mimes:jpg,jpeg,png',
            'facility' => 'required',
        ]);

        $building = new Building();
        $building->name = $request->name;
        $building->image = Storage::disk('public')->put('building', $request->file('image'));
        $building->facility = $request->facility;
        $building->save();

        return redirect()->route('building')->withSuccess('Building created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_view($id)
    {
        $data = Building::find($id);
        return view('cms.building.update', compact('data'));
    }

    public function update_process(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'facility' => 'required',
        ]);

        $building = Building::find($id);
        $building->name = $request->name;

        if (isset($request->image)) {
            $image_path = 'storage/' . $building->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $building->image = Storage::disk('public')->put('building', $request->file('image'));
        }

        $building->facility = $request->facility;
        $building->save();

        return redirect()->route('building')->withSuccess('Building updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $building = Building::find($id);
        $building->delete();

        return redirect()->route('building')->withSuccess('Building deleted successfully.');
    }
}
