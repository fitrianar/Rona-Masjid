<?php

namespace App\Helper;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class ImageUpload
{
    public static function pushStorage($dir, $size, $format, $image)
    {        
        $directory = $dir;
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
        
        $imageName    = $format.'_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('png', 100);
        
        $image_resize->save(public_path($directory.$imageName));
        $nameFile = $directory . $imageName;
        return $nameFile;
    }

    public static function pushFile($dir, $fileName, $data)
    {
        Storage::disk('public')->put($dir.$fileName, $data);
    }

    public static function pushBerkas($dir, $data)
    {
        $fileName    = uniqid().'-'.$data->getClientOriginalName();
        $data->move($dir, $fileName);

        return $dir.$fileName;
    }

}
