<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = "products_categories";
    protected $guarded = [];
}