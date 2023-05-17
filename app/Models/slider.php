<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class slider extends Model implements TranslatableContract
{
    use Translatable;
    // use HasFactory;

    protected $table = 'slider';

    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description','image'];

    public function getImagePathAttribute(){
        return asset('storage/images/sliders/' . $this->image) ;
    }
}
