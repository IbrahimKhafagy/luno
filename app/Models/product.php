<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class product extends Model implements TranslatableContract
{
    use Translatable;
    // use HasFactory;

    protected $table = 'product';

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description','image','category_id','price','have_offfer','finally_price'];


    public function category()
    {
        return $this->belongsTo(\App\Models\category::class, 'category_id');
    }


}
