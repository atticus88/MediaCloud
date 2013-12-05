<?php

class PermissionsController extends BaseController {

//	public function __call($method, $args){
//
//        //assetsController_index
//
//
////        $this->checkPermissions();
//
//        //do other stuff
//        //possibly do method_exists check
//
//        var_dump($method);
//        var_dump($args);
//        var_dump(get_class($this));
//        die();
//
//        return call_user_func_array(array($this, $method), $args);
//    }

//    public function __callStatic($method, $args){
//
//        //assetsController_index
//
//
////        $this->checkPermissions();
//
//        //do other stuff
//        //possibly do method_exists check
//
//        var_dump($method);
//        var_dump($args);
//        var_dump(get_class($this));
//        die();
//
//        return call_user_func_array(array($this, $method), $args);
//    }

	public function checkPermissions($permissionKey){

		if (!Sentry::getUser()->hasAccess('$permissionKey')) {
            Session::flash('error', Lang::get('admin/permissions/message.no_permission'));
            return Redirect::route('admin');
        }

	}





	/**
	 * Encodes the permissions so that they are form friendly.
	 *
	 * @param  array  $permissions
	 * @param  bool   $removeSuperUser
	 * @return void
	 */
	protected function encodeAllPermissions(array &$allPermissions, $removeSuperUser = false)
	{
		foreach ($allPermissions as $area => &$permissions)
		{
			foreach ($permissions as $index => &$permission)
			{
				if ($removeSuperUser == true and $permission['permission'] == 'superuser')
				{
					unset($permissions[$index]);
					continue;
				}

				$permission['can_inherit'] = ($permission['permission'] != 'superuser');
				$permission['permission']  = base64_encode($permission['permission']);
			}

			// If we removed a super user permission and there are
			// none left, let's remove the group
			if ($removeSuperUser == true and empty($permissions))
			{
				unset($allPermissions[$area]);
			}
		}
	}

	/**
	 * Encodes user permissions to match that of the encoded "all"
	 * permissions above.
	 *
	 * @param  array  $permissions
	 * @return void
	 */
	protected function encodePermissions(array &$permissions)
	{
		$encodedPermissions = array();

		foreach ($permissions as $permission => $access)
		{
			$encodedPermissions[base64_encode($permission)] = $access;
		}

		$permissions = $encodedPermissions;
	}

	/**
	 * Decodes user permissions to match that of the encoded "all"
	 * permissions above.
	 *
	 * @param  array  $permissions
	 * @return void
	 */
	protected function decodePermissions(array &$permissions)
	{
		$decodedPermissions = array();

		foreach ($permissions as $permission => $access)
		{
			$decodedPermissions[base64_decode($permission)] = $access;
		}

		$permissions = $decodedPermissions;
	}

}
