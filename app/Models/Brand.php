<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Database\Factories\BrandFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    /** @use HasFactory<BrandFactory> */
    use HasFactory;

    use HasSlug;

    protected $table = 'brands';

    protected $fillable = [
        'slug',
        'title',
        'thumbnail',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function getId()
    {
        return $this->id;
    }
}
