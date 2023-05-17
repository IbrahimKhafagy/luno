<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::get();
        return view('admin.category.category', compact('categories'));
    }


    public function create()
    {
        $categories = category::get();
        return view('admin.category.create', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->only('name:ar', 'name:en', 'description:ar', 'description:en', 'parent_id');

        if ($request->hasFile('image')) {
            $destination = 'public/images/categories';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $image_name);

            $data['image'] = $image_name;
        }
        $category = category::create($data);
        if ($category) {
            return response()->json([
                'success' => 'Post created successfully.',
                'code' => 200
            ]);
        } else {

            return response()->json([
                'message' => 'error',
                'code' => 422
            ]);
        }
        // session()->flash('edit', 'تم الحفظ  بنجاح'
        // return redirect()->back();
    }
    public function edit($id)
    {
        $category = category::find($id);
        $categories = category::get();

        return view('admin.category/edit-category', compact('category', 'categories'));
    }


    public function update(UpdateCategoryRequest $request)
    {
        $category = category::findOrfail($request->category_id);

        if (!$category)

            return response()->json([
                'status' => false,
                'msg' => 'هذ القسم غير موجود',
            ]);
        $data = $request->only('name:en', 'name:ar', 'parent_id', 'description:en', 'description:ar', 'image');
        if ($request->hasFile('image')) {
            $destination = 'public/images/categories';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $image_name);

            $data['image'] = $image_name;
        }


        $category->update($data);
        return response()->json([
            'success' => 'Post updated successfully.',
            'code' => 200

        ]);

        // session()->flash('edit', 'تم التعديل بنجاح');
        // return redirect()->route('category')->with('message','updated successfully');
    }




    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();

        session()->flash('destroy', 'deleted sucssesfuly');
        return redirect()->back()->with('error', 'deleted successfully');
    }





    public function getUsersdatatable()
    {
        $data = category::with('translations')->newQuery();
        return datatables::of($data)

            ->addIndexColumn()

            ->addColumn('process', function ($row) {
                $btn1 = '<a href="' . route('edit.category', $row->id) . '" class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
                $btn2 = '<a class="btn btn-danger btn-sm delete_btn" category_id=' . $row->id . '><i class="fa fa-trash"></i></a>';
                return $btn1 . "  " . $btn2;
            })

            ->addColumn('image', function ($row) {
                return '<img src="' . $row->image_path . '" style="width: 150px;height:120px"/>';
            })

            ->addColumn('parent_id', function ($row) {
                return $row->parent_id == null ? 'Main Category' : $row->parent?->name;
            })

            ->rawColumns(['parent_id' => 'parent_id', 'image' => 'image', 'process' => 'process'])
            ->toJson();
    }

    public function delete(Request $request)
    {
        $category = category::find($request->id);
        if ($category) {
            $category->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
