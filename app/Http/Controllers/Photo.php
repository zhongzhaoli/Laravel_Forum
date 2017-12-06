<?php

namespace App\Http\Controllers;

class Photo{
    public $path_f;
    public function __construct($file){
        $allowed_extensions = ['jpg','jpeg','png','gif'];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return redirect()->back()->withInput()->withErrors('上传图片格式错误');
        }
        $path = base_path()."/public/upload/";
        $filename = 'img'.time().rand(100000, 999999).".".$file->getClientOriginalExtension();
        $file->move($path, $filename);
        $filePath = "upload/".$filename;
        $this->path_f = $filePath;
        // return $filePath;
    }
}
?>