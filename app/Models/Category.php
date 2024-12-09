<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    use HasSlug;

    protected $table = 'categories';

    protected $fillable = [
        'slug',
        'title',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id', 'id', 'id');
    }
}
