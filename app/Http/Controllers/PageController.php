<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Products;
use App\Store;
use App\User;
use App\View;
use App\Recipe;
use App\Order;
use App\Room;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PageController extends Controller
{
    public function welcome(Request $request)
    {
        //  check if user logged in
        if (Auth::user() !== NULL) {
            // if admin access will redirected to admin home
            if (Auth::user()->roles == "admin") {
                return redirect(route(
                    'admin.home'
                ));
            }

            // if not admin will redirected to home
            if (Auth::user()->roles != "admin") {
                return redirect(route(
                    'home'
                ));
            }
        }

        return view('welcome');
    }
}
