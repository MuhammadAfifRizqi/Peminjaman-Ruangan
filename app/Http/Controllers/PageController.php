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
        $product = Products::latest()->take(6)->get();
        return view('welcome', compact('product'));
    }

    public function katalog(Request $request, $search = "")
    {
        $room = Room::paginate(8);
        $category = Category::all();
        if (isset($request->category)) {
            $room = Room::where('id_category', '=', $request->category)->paginate(8)->get();
        } else {
            if (isset($request->search)) {
                $search = $request->search;
            }
            $room = Room::where('room_number', 'LIKE', '%' . $search . '%')
                ->orWhere('facility', 'LIKE', '%' . $search . '%')
                ->paginate(8);
        }
        return view('katalog', compact('room', 'category', 'search'));
    }

    public function detailProduk(Request $request, $id_product)
    {
        // adding view
        $view = new View();
        $view->id_product = $id_product;
        $view->save();

        $product = Products::find($id_product);
        $recipe = Recipe::where('id_product', '=', $product->id)->first();
        $material = Material::where('id_product', '=', $product->id)->get();
        $price = $material->sum('price');
        $data = Products::latest()->take(4)->get();
        return view('detailProduk', compact('product', 'data', 'recipe', 'material', 'price'));
    }

    public function payment(Request $request, $id_product)
    {
        $product = Products::find($id_product);
        $recipe = Recipe::where('id_product', '=', $product->id)->first();
        $material = Material::where('id_product', '=', $product->id)->get();
        $price = $material->sum('price');
        $data = Products::latest()->take(4)->get();

        $order = new Order();
        $order->id_user = Auth::user()->id;
        $order->id_product = $id_product;
        $order->price = $price;
        $order->save();

        return view('payment', compact('product', 'data', 'recipe', 'material', 'price', 'id_product'));
    }

    public function topUp_process(Request $request, $id_product)
    {
        $product = Products::find($id_product);
        $recipe = Recipe::where('id_product', '=', $product->id)->first();
        $material = Material::where('id_product', '=', $product->id)->get();
        $price = $material->sum('price');
        $data = Products::latest()->take(4)->get();

        return view('paymentSuccess', compact('product', 'data', 'recipe', 'material', 'price', 'id_product'));
    }

    public function history(Request $request)
    {
        $data = Order::where('id_user', '=', Auth::user()->id)->get();
        foreach($data as $d){
            $d->{'product_name'} = Products::find($d->id_product)->title;
        }
        return view('history', compact('data'));
    }
}
