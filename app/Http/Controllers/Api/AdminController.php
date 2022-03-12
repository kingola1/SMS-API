<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminManager;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Lists Admins
     *
     * @return void
     */
    public function index ()
    {
        $this->authorize('viewAny', Admin::class);
        $admins = AdminManager::getAdmins();
        return response()->json($admins);
    }
}
