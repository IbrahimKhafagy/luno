<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::get();
        return view('admin.product.product',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::get();
        return view('admin.product.create-product',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request->all());
        $request->validate([
            'name:ar' => 'required',
            'name:en' => 'required',
            'description:ar' => 'required',
            'description:en' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|mimes:jpg,png',
            'price' => 'required',
            'have_offfer' => 'required',
        ]);

        $data = $request->only('name:ar', 'name:en', 'description:ar', 'description:en', 'category_id','image','price','have_offfer','finally_price');

        if ($request->hasFile('image')) {
            $destination = 'public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $image_name);

            $data['image'] = $image_name;
        }
        $product = product::create($data);


         if($product) {
            return response()->json([
                'success' => 'Post created successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'error.',
                'code' => 500
            ]);
        }
        // session()->flash('success', 'تم الحفظ  بنجاح');
        // return redirect()->back()->with('message','created succsessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);

        return view('admin.product/edit-product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::findOrfail($id);


        $data = $request->only('name','description','image','price','have_offfer','finally_price');


        if($request->hasFile('image')){

            $destination ='public/images/products';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $product->update($data);

        return redirect()->route('product')->with('message','updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        // return $id;


        $product = product::find($id);
        $product->delete();


        // return response('Post deleted successfully.', 200);


        // session()->flash('destroy', 'deleted sucssesfuly');
        return redirect()->back()->with('errro','deleted sucssesfuly');
    }
}
