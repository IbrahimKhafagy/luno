<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\services\brandService;
use Yajra\DataTables\Facades\DataTables;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $brands = Brand::all();
        return view('admin/brands/create', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BrandRequest $request, brandService $action)
    {
        $brand = $action->storeBrand($request);
        if ($brand) {
            return response()->json([
                'success' => 'Post created successfully.',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'error' => 'error',
                'code' => 500
            ]);
        }
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
        return view('admin/brands/brands', compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brands/edit-brand', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, brandService $action)
    {

        $brands = $action->updateBrand($request);
        if (!$brands)
            return response()->json([
                'status' => false,
                'msg' => 'هذ العرض غير موجود',
            ]);

        return response()->json([
            'success' => 'Post updated successfully.',
            'code' => 200
        ]);
    }




    public function getUsersdatatable()
    {
        $data = Brand::with('translations')->newQuery();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('process', function ($row) {
                $btn1 = '<a href="' . route('edit.brand', $row->id) . '" class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
                $btn2 = '<a class="btn btn-danger btn-sm delete_btn" brand_id=' . $row->id . '><i class="fa fa-trash"></i></a>';
                return $btn1 . "  " . $btn2;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->image_path . '" style="width: 150px;height:120px"/>';
            })
            ->rawColumns(['image' => 'image', 'process' => 'process'])
            ->toJson();
    }



    public function delete(Request $request)
    {
        $brand = Brand::find($request->id);
        if ($brand) {
            $brand->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
