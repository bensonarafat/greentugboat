<?php
namespace App\Http\Classes;

class SystemFileManager{

    public static function InternalUploader($file, $type){
        $fname = "uploads/".$type."/" . rand() . '-'. time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path("/uploads" . "/". $type), $fname);
        return $fname;
    }
}
?>
