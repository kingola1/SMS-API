<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

    /**
     * Store a newly created admin
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $this->authorize('create', Admin::class);
        $admins = AdminManager::createAdmin($request);
        return response()->json();
    }

    /**
     * Show Admins
     *
     * @return void
     */
    public function show ($id)
    {
        $this->authorize('view', Admin::class);
        $admins = AdminManager::showAdmins($id);
        return response()->json($admins);
    }

    /**
     * Update the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update ($id, $request)
    {
        $this->authorize('update', Admin::class);
        $admins = AdminManager::updateAdmins($request, $id);
        return response()->json($admins);
    }

    /**
     * Remove an Admin
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy($request, $id)
    {
        $this->authorize('delete', Admin::class);
        $admins = AdminManager::deleteAdmins($request, $id);
        return response()->json();
    }
}
