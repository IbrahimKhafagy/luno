<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productTranslation extends Model
{
    // use HasFactory;

    protected $table = 'product_translations';
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
