<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManager {

    public static function getAdmins ()
    {
        $admins = Admin::paginate(request('per-page', 15));
        
        return $admins;
    }

    public static function createAdmin ()
    {
        $admin = Admin::create([]);
        return $admin;
    }

    public static function getAdmin ($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    public static function updateAdmins ($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    public static function deleteAdmins ($id)
    {
        $admin = Admin::find(User::find($id)->delete());
        return $admin;

        // $admin->deleteAdmins(delete());
        // return $admin;
    }
    
} 