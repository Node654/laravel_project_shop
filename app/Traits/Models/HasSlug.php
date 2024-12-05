<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait HasSlug
{
    private static int $count = 1;

    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $item) {
            $item->slug = static::getUniqueSlug($item);
        });
    }

    public static function slugFrom(): string
    {
        return 'title';
    }

    private static function getUniqueSlug(Model $item): string
    {
        $slug = $item->slug ?? Str::slug($item->{static::slugFrom()});
        if (! $item->newQuery()->where('slug', $slug)->first())
        {
            static::$count = 1;
            return $slug;
        }
        if (str_contains($slug, '-') && is_int(strpos($slug, '-') + 1)) {
            $slug = substr_replace($slug, substr($slug, 0, strpos($slug, '-')), 0);
        }
        $item->slug = $slug . '-' . static::$count;
        static::$count++;
        return self::getUniqueSlug($item);
    }
}
