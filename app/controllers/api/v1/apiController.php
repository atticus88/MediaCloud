<?php

namespace Controllers\Api\V1;

use Asset;
use BaseController;
use CollectionPlaylistAsset;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Request;
use User;


class ApiController extends BaseController {

    public function users($id = null){
        if($id==null){
            return $users = User::all();
        }
        else{
            try{
                return User::findOrFail($id);
            }
            catch(ModelNotFoundException $e){

            }
            catch(Exception $e){
                return array('error' => $e->getMessage());
            }

        }
    }

    public function cpa($id){
        $cpa = new CollectionPlaylistAsset;
        return $cpa->get_cpa_by_user_id($id);
    }

    public function assets($id = null){
        if($id==null){
           return Asset::all();
        }
        else{
            $user = User::find($id);
            $assets = array();
            foreach ($user->assets as $asset)
            {
                $assets[] = $asset["attributes"];
            }
            return $assets;
        }
    }


    public function test(){
        return json_encode(array(Request::query(), Request::ajax(), Request::cookie()));
    }

}
//Route::get('allusers', function(){
//$users = User::all();
//$data = array();
//foreach ($users as $key => $user) {
//    $data[$key] = $user->username .":".$user->id;
//    // $data[$key]['tokens'] = array();
//    // $data[$key]['tokens'][0] = $user->username;
//    // $data[$key]['tokens'][1] = "$user->id";
//}
//return $data;
//});
