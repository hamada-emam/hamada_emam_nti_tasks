<?php
namespace App\Services;

class HasMedia {
    public static function upload($image,$path)
    {
        $imageName = $image->hashName();
        $image->move($path,$imageName);
        return $imageName;
    }

    public static function delete($path)
    {
        if(file_exists($path)){
            unlink($path);
            return true;
        }
        return false;
    }
}
