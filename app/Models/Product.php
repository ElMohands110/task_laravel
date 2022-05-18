<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'p_name',
        'p_desc',
        'image',
    ];

    public $timestamps = false;


    public function apiUser() {
        $this->belongsTo(Product::class, 'owner');
    }
}
