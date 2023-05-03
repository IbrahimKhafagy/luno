<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements TranslatableContract
{
    use Translatable;
    // use HasFactory;

    protected $table = 'brands';

    public $translatedAttributes = ['name'];
    protected $fillable = ['image','name'];


    public function getImagePathAttribute(){
        return asset('storage/images/brands/' . $this->image) ;
    }
}

