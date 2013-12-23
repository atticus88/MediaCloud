<?php

use Illuminate\Support\Facades\Config;
use MC\Exceptions\UploadFileNotAllowedException;

class Mimes {

    protected $mimes;

    public function __construct(){
        $this->mimes = Config::get('mimes');
    }

    public static function getMimes($extension){
        $mimes = Config::get('mimes');
        $hasExt = array_key_exists($extension, $mimes);

        if(!$hasExt){
            throw new UploadFileNotAllowedException('File Not Allowed - ' . $extension);
        }
        if(gettype($mimes[$extension]) == 'array'){
            return $mimes[$extension][0];
        }
        else{
            return $mimes[$extension];
        }

    }

} 