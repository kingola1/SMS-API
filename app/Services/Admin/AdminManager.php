<?php

namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManager {

    public static function getAdmins ()
    {
        $admins = Admin::paginate(request('per-page', 15));
        
        return $admins;
    }

    public static function createAdmin (Request $request)
    {
        $admins = Admin::create([
            'name' => $request->input(),
            'email' => $request->input(),
            'password' => $request->input()
        ]);
        return response(201);
    }

    public static function showAdmins ($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }

    public static function updateAdmins (Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->updateAdmins($request->all());
        return response($admin, 200);
    }

    public static function deleteAdmins (Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->deleteAdmins($request->delete());
        return response($admin, 204);
    }
    
} 