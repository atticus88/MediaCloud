<?php

namespace MC\Services;


use Asset;
use MC\Exceptions\ValidationException;
use MC\Validators\UploadValidator;

class UploadCreatorService {

    protected $validator;

    public function __construct(UploadValidator $validator){
        $this->validator = $validator;
    }


    public function make(array $attributes){



        if($this->validator->isValid($attributes)){
            // Create a new asset
            $asset = new Asset;

            // Update the asset data
            $asset->alphaid 			= $attributes['alphaid'];
            $asset->title 				= $attributes['title'];
            $asset->description 		= $attributes['description'];
            $asset->transcoded_url 		= $attributes['transcoded_url'];
            $asset->thumbnail_url 		= $attributes['thumbnail_url'];
            $asset->type 				= $attributes['type'];
            $asset->status 				= $attributes['status'];
            $asset->save();
            return true;

        }else{
            throw new ValidationException('Upload validation failed', $this->validator->getErrors());
        }


        // Upload file



        // Save Asset if valid

        //do i have user_id and asset_id

        // save user_asset table

    }

    public function upload(){
        $file = Input::file('file');
        $destinationPath =  base_path(). "/" . Config::get('settings.media-path-original');
        $filename = $file->getClientOriginalName();
        $extension =$file->getClientOriginalExtension();
        return Input::file('file')->move($destinationPath, $filename);
    }

    public function saveAsAsset(){

    }
} 