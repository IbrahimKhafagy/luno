<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\category;
use App\Models\product;
use Yajra\DataTables\Facades\DataTables;


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
    public function store(ProductRequest $request)
    {
// dd($request->all());
        $data = $request->only('name:ar', 'name:en', 'description:ar', 'description:en','category_id','parent_id','image','price','have_offfer','offer_type','offer_value','finally_price');
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
        $categories = Category::all();

        return view('admin.product/edit-product',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request)
    {
        $product = product::findOrfail($request->product_id);

        if (!$product)
        return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);

        $data = $request->only('name:ar','name:en','description:en','description:ar','category_id','parent_id','image','price','have_offfer','offer_type','offer_value','finally_price');
        if($request->hasFile('image')){
            $destination ='public/images/products';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $product->update($data);
        return response()->json([
            'success' => 'Post updated successfully.',
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        {
            $product = product::find($request->id);
            if ($product) {
                $product->delete();
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
    }





    public function getUsersdatatable()
    {
        $data = product::with('translations')->newQuery();
         return datatables::of($data)

        ->addIndexColumn()
            ->addColumn('process', function ($row) {
                $btn1='<a href="'. route('edit.product',$row->id) .'" class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
                $btn2='<a  class="edit btn btn-danger btn-sm delete_btn"  data-toggle="modal" product_id=' . $row->id . ' data-target="#deletemodal" ><i class="fa fa-trash"></i></a>';
            return $btn1 ."  ". $btn2;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->image_path . '" style="width: 150px;height:120px"/>' ;
            })
            ->addColumn('category_id', function ($row) {
                return  $row->category->name;
            })
            ->addColumn('have_offfer', function ($row) {
                return  $row->have_offfer == 0 ? 'no' : 'yes';
            })
            ->addColumn('offer_type', function ($row) {
                return  $row->offer_type == 'percentage' ? 'percentage' : 'value';
            })
            ->addColumn('offer_value', function ($row) {
                $offerValue = $row->offer_value;
                if ($row->offer_type == 'percentage') {
                    $offerValue .= '%';
                }
                return $offerValue;
            })
            ->rawColumns(['image'=>'image','process'=>'process','category_id'=>'category_id','have_offfer'=>'have_offfer','offer_type'=>'offer_type','offer_value'=>'offer_value'])
            ->toJson();
        }

}
