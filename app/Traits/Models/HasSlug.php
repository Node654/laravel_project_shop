<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function (Model $item) {
            $item->makeSlug();
        });
    }

    public function slugColumn(): string
    {
        return 'slug';
    }

    public function slugFrom(): string
    {
        return 'title';
    }

    protected function makeSlug(): void
    {
        if (! $this->{$this->slugColumn()}) {
            $slug = $this->slugUnique(Str::slug($this->{$this->slugFrom()}));
            $this->{$this->slugColumn()} = $slug;
        }
    }

    protected function slugUnique(string $slug): string
    {
        $originalSlug = $slug;
        $i = 0;

        while ($this->slugExists($slug)) {
            $i++;
            $slug = $originalSlug.'-'.$i;
        }

        return $slug;
    }

    protected function slugExists(string $slug): bool
    {
        $query = $this->newQuery()
            ->where(self::slugColumn(), $slug)
            ->where($this->getKeyName(), '!=', $this->getKey())
            ->withoutGlobalScopes();

        return $query->exists();
    }
}
