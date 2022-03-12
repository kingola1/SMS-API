<?php

namespace App\Services\Admin;

use App\Models\Admin;

class AdminManager {

    public static function getAdmins ()
    {
        $admins = Admin::paginate(request('per-page', 15));
        
        return $admins;
    }
}