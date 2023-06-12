<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\slider;


class HomeController extends Controller
{
    public function index(){

        $sliders = slider::all();
        $brands = Brand::all();

        $product = product::all();

            return view('user.index', compact('sliders','brands','product'));

    }



    public function shop(Request $request) {
        $product = Product::query();
        $product->when($request->has('price-all'), function ($query) {
            // تم تحديد "All Price"
        }, function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->when($request->has('price-1'), function ($query) {
                    // تم تحديد "$0 - $100"
                    $query->orWhereBetween('finally_price', [0, 100]);
                });
                $query->when($request->has('price-2'), function ($query) {
                    // تم تحديد "$100 - $200"
                    $query->orWhereBetween('finally_price', [100, 200]);
                });
                $query->when($request->has('price-3'), function ($query) {
                    // تم تحديد "$200 - $300"
                    $query->orWhereBetween('finally_price', [200, 300]);
                });
                $query->when($request->has('price-4'), function ($query) {
                    // تم تحديد "$300 - $400"
                    $query->orWhereBetween('finally_price', [300, 400]);
                });
                $query->when($request->has('price-5'), function ($query) {
                    // تم تحديد "$400 - $500"
                    $query->orWhereBetween('finally_price', [400, 500]);
                });
            });
        });
        $product = $product->get();
        return view('user.pages.shop', compact('product'));
    }

    public function addToCart($id){

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');


    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('user.pages.details', compact('product'));
    }

    public function cart(){
        $product = product::get();
        return view('user.pages.cart', compact('product'));
        }



        public function remove(Request $request)
        {
            if($request->id) {
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Product removed successfully');
            }
        }


        public function updateCart(Request $request)
        {


            $cart = session()->get('cart');
            $id = $request->input('id');
            $quantity = $request->input('quantity');

            if (isset($cart[$id])) {
                $item = $cart[$id];
                $itemTotal = $item['price'] * $quantity;
                $cartSubtotal = 0;
                $cartTotal = 0;

                $item['quantity'] = $quantity;
                $item['itemTotal'] = $itemTotal;
                $cart[$id] = $item;

                foreach ($cart as $id => $item) {
                    $cartSubtotal += $item['itemTotal'];

                }
                $cartTotal = $cartSubtotal;

                session()->put('cart', $cart);

                $data = [
                    'cartCount' => count($cart),
                    'itemTotal' => number_format($itemTotal, 2),
                    'quantity' => $quantity,
                    'cartSubtotal' => number_format($cartSubtotal, 2),
                    'cartTotal' => number_format($cartTotal, 2),
                ];

                return response()->json($data);
            }
        }


        public function contact(){

            return view('user.pages.contact');
            }

    }
