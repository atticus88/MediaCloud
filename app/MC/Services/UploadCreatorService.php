<?php

namespace MC\Services;

use Asset;

use Config;
use Illuminate\Queue\BeanstalkdQueue;
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

        $filename = $file->getClientOriginalName();
        $extension =$file->getClientOriginalExtension();
        $filetype = Mimes::getMimes($extension);






        $assetId = "";
        $attributes = array(
            "title" => $filename,
            "filename_original" => $filename,
            "filename" => $filename,
            "type" => preg_replace('/(\w+)\/(.*)/','${1}',$filetype),
            "status" => "uploaded"
        );
        // If not a video or audio no need to transcode or save original out again.
        if($attributes['type'] == "video" || $attributes['type'] == "audio"){
            $destinationPath =  base_path(). "/" . Config::get('settings.media-path-original');
        }else{
            $destinationPath =  base_path(). "/" . Config::get('settings.media-path');
        }

        // Save Asset if valid

        if($this->validator->isValid($attributes)){
            // Create a new asset
            $asset = new Asset;
            $asset->title               = $attributes['title'];
            $asset->type                =   $attributes['type'];
            $asset->status              = "uploaded";
            $asset->save();
            $assetId = $asset->id;

        }else{
            throw new ValidationException('Upload validation failed', $this->validator->getErrors());
        }

        // get assetId, call alphaId
        $alpha_out  = alphaID($assetId, false);
        // $number_out = alphaID($alpha_out, true);


        // save filename as alphaId
        $asset->alphaID = $alpha_out;
        $asset->save();

        $file->move($destinationPath, $asset->alphaID . "." . $extension);

        BeanstalkdQueue::push($job);
//        Queue::push('Transcode', array('asset_id' => $asset_id, 'filepath' => $filepath, 'type'=>$type));

        // save asset_user table
        $user = User::find($userId);
        $user->assets()->attach($assetId);

    }


}