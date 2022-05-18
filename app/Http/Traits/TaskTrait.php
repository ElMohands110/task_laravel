<?php

namespace App\Http\Traits;

use App\Models\ApiUser;
use App\Models\Product;
use Illuminate\Http\Request;

trait TaskTrait
{
    protected function imageSave($photo, $folder) {
        $file = $photo;
        $file_extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = public_path($folder);
        $file->move($path,$file_name);

        return $file_name;
    }
}
