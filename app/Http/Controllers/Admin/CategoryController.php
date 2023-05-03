<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\category;

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
    public function store(Request $request)
    {

        $request->validate([
            'name:ar' => 'required',
            'name:en' => 'required',
            'description:ar' => 'required',
            'description:en' => 'required',
            'parent_id' => 'nullable',
            'image' => 'nullable|mimes:jpg,png',
        ]);

        $data = $request->only('name:ar', 'name:en', 'description:ar', 'description:en', 'parent_id');

        if ($request->hasFile('image')) {
            $destination = 'public/images/categories';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination, $image_name);

            $data['image'] = $image_name;
        }
        $category = category::create($data);

         if($category) {
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
        // session()->flash('edit', 'تم الحفظ  بنجاح');
        // return redirect()->back();
    }
    public function edit($id)
    {
        $category = category::find($id);

        return view('admin.category/edit-category',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = category::findOrfail($id);


        $data = $request->only('name','description','image');

        if($request->hasFile('image')){

            $destination ='public/images/categories';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $category->update($data);
            // 'name' => $request->name,
            // 'description' => $request->description,
            // 'parent_id' => $request->parent_id,
            // 'image' => $request->image,


        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect()->route('category')->with('message','updated successfully');
    }
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();

        session()->flash('destroy', 'deleted sucssesfuly');
        return redirect()->back()->with('error','deleted successfully');
    }
}
