<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;
    use HasSlug;

    protected $table = 'products';

    protected $fillable = [
        'slug',
        'title',
        'brand_id',
        'thumbnail',
        'price',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id', 'id', 'id');
    }
}
