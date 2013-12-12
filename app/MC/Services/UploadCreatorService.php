<?php

namespace MC\Services;




use Asset;

use Config;
use MC\Exceptions\ValidationException;
use MC\Validators\UploadValidator;
use Mimes;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use User;


class UploadCreatorService {

    protected $validator;

    public function __construct(UploadValidator $validator){
        $this->validator = $validator;
    }


    public function make($userId, UploadedFile $file){

        // Upload file
        $destinationPath =  base_path(). "/" . Config::get('settings.media-path-original');
        $filename = $file->getClientOriginalName();
        $extension =$file->getClientOriginalExtension();
        $filetype = Mimes::getMimes($extension);
        $assetId = "";
        $attributes = array(
            "title" => $filename,
            "type" => preg_replace('/(\w+)\/(.*)/','${1}',$filetype)
        );

        $file->move($destinationPath, $filename);

        // Save Asset if valid

        if($this->validator->isValid($attributes)){
            // Create a new asset
            $asset = new Asset;
            $asset->title 				= $attributes['title'];
            $asset->type 				=   $attributes['type'];
            $asset->status 				= "uploaded";
            $asset->save();
            $assetId = $asset->id;

        }else{
            throw new ValidationException('Upload validation failed', $this->validator->getErrors());
        }



        // save asset_user table
        $user = User::find($userId);
        $user->assets()->attach($assetId);

    }


} 