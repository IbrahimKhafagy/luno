<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryTranslation extends Model
{
    // use HasFactory;

    protected $table = 'category_translations';
    public $timestamps = false;
    protected $fillable = ['name','description'];
}
