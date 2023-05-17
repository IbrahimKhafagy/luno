<?php

namespace App\services;

use App\Models\Brand;

class brandService {

    public function storeBrand($request) {
        $data = $request->only('name:ar','name:en');
        if($request->hasFile('image')){
            $destination ='public/images/brands';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $brand = Brand::create($data);
        return $brand;

    }


    public function updatebrand($request){

        $brands = Brand::findOrfail($request->brand_id);
        
        $data = $request->only('name:en','name:ar','image');
        if($request->hasFile('image')){
            $destination ='public/images/brands';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);

            $data['image']=$image_name;
        }
        $brands->update($data);
        return $brands;




    }

}

