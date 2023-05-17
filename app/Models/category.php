<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class category extends Model implements TranslatableContract
{
    use Translatable;
    // use HasFactory;

    protected $table = 'categories';

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description','image','parent_id'];

    public function subcategory()
    {
        return $this->hasMany(category::class, 'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(category::class, 'parent_id');
    }

    public function getImagePathAttribute(){
        return asset('storage/images/categories/' . $this->image) ;
    }

}
