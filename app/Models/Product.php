<?php

// Define Fillable + Casts



// Laravel-12
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Product extends Model
// {
//     /** @use HasFactory<\Database\Factories\ProductFactory> */
//     use HasFactory;

//     // fields yang boleh mass-assigment untuk security
//     protected $fillable = [
//         'name',
//         'description',
//         'price',
//         'stock',
//         'sku',
//         'is_active',
//     ];

//     // auto cast ke type yang benar
//     protected $casts = [
//         'price' => 'decimal:2',
//         'stock' => 'integer',
//         'is_active' => 'boolean',
//     ];
// }

// Laravel-13
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;

#[Table('products')]
#[Fillable(['name', 'description', 'price', 'stock', 'sku', 'is_active'])]
#[Hidden(['created_at'])]
class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
    ];
}
