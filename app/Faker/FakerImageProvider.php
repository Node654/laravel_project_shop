<?php

namespace App\Faker;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakerImageProvider extends Base
{
    public function loremFlickr(string $dir = '', int $width = 400, int $height = 400): string
    {
        $name = $dir.'/'.Str::random(7).'.png';
        Storage::put($name, file_get_contents("https://loremflickr.com/$width/$height"));

        return 'storage/'.$name;
    }
}