<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile,$permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile){

        $profile = $this->profile->find($idProfile)->with('permissions')->find($idProfile);

        if(!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions;

        return view('admin.pages.perfis.permissoes.index',compact('profile','permissions'));

    }
}
