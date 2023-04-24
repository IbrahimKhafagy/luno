<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $brands = Brand::all();
        return view('admin/brands/create',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name:ar' => 'required',
            'name:en' => 'required',
            'image' => 'nullable|mimes:jpg,png',
        ]);

        $data = $request->only('name:ar','name:en');
        if($request->hasFile('image')){
            $destination ='public/images/brands';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $brand = Brand::create($data);
        if($brand) {
            return response()->json([
                'success' => 'Post created successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'error.',
                'code' => 500
            ]);
            // session()->flash('edit', 'تم التعديل بنجاح');
        }


        // return   response(redirect()->back());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $brands = Brand::all();
        return view('admin/brands/brands',compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = Brand::find($id);

        return view('admin.brands/edit-brand',compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brands = Brand::findOrfail($id);

        $request->validate([
            'name' => 'required',
            // 'name:en' => 'required',
            'image' => 'nullable|mimes:jpg,png',
        ]);

        $data = $request->only('name','image');
        // dd($data);
        if($request->hasFile('image')){
            $destination ='public/images/brands';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $brands->update($data);

        // if($request->hasFile('image')){
        //     $destination ='public/images/brands';
        //     $image = $request->file('image');
        //     $image_name =$image ->getClientOriginalName();
        //     $path=$request-> file('image')->storeAs($destination,$image_name);

        //     $data['image']=$image_name;
        // }
        // $brands->update([
        //     'name' => $request->name,

        //     'image' => $data,
        // ]);

        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect()->route('show');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $brand = Brand::find($id);
    $brand->delete();

    session()->flash('destroy', 'deleted sucssesfuly');
    return redirect()->back();
    }


    public function getUsersdatatabe()
    {
        // if (auth()->user()->can('viewAny', $this->user)) {
        $data = Brand::select('*');
        // }else{
        //     $data = Brand::where('id' , auth()->user()->id);
        // }
        return   Datatables::of($data)
            ->addIndexColumn()
        //     ->addColumn('action', function ($row) {
        //         $btn = '';
        //         if (auth()->user()->can('update', $row)) {
        //             $btn .= '<a href="' . Route('dashboard.users.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
        //         }
        //         if (auth()->user()->can('delete', $row)) {
        //             $btn .= '

        //                 <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
        //         }
        //         return $btn;
        //     })
        //     ->addColumn('status', function ($row) {
        //         return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
        //     })
        //     ->rawColumns(['action', 'status'])
            ->make(true);
    }

}




