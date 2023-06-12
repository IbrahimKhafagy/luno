<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/slider/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SliderRequest $request)
    {
        $data = $request->only('name:ar','name:en','description:en','description:ar');
        if($request->hasFile('image')){
            $destination ='public/images/sliders';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $slider = slider::create($data);
        if($slider) {
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sliders = slider::all();
        return view('admin/slider/sliders',compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = slider::find($id);
        $html = view('admin.slider.edit-slider',compact('slider'))->render();
        return response()->json([
            'status' => 200,
            'slider' => $slider,
            'html'=>$html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $slider = slider::findOrfail($request->slider_id);
        if (!$slider)
            return response()->json([
                'status' => false,
                'msg' => 'هذ القسم غير موجود',
            ]);

        $data = $request->only('name:en','name:ar','description:en','description:ar', 'image');
        if ($request->hasFile('image')) {
            $destination = 'public/images/sliders';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $image_name);

            $data['image'] = $image_name;
        }
        $slider->update($data);
        return response()->json([
            'success' => 'slider updated successfully.',
            'code' => 200

        ]);

        // session()->flash('edit', 'تم التعديل بنجاح');
        // return redirect()->route('category')->with('message','updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete (Request $request)
    {


        $slider = slider::find($request->id);
        if ($slider) {
            $slider->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);


    }


    public function getUsersdatatable(){
        $data = slider::with('translations')->newQuery();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('process', function ($row) {
                $btn1 = '<a value="' . $row->id.'" class="edit btn btn-success btn-sm btn btn-primary px-4 text-uppercase edit_btn" data-bs-toggle="modal"
                data-bs-target="#CreateEvent" " ><i class="fa fa-edit"></i></a>';
                $btn2 = '<a class="btn btn-danger btn-sm delete_btn" slider_id=' . $row->id . '><i class="fa fa-trash"></i></a>';
                return $btn1 . "  " . $btn2;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . $row->image_path . '" style="width: 150px;height:120px"/>';
            })
            ->rawColumns(['image' => 'image', 'process' => 'process'])
            ->toJson();
    }
}
