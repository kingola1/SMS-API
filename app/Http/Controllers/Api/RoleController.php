<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(){
        request()->validate([
            'name' => 'filled|string'
        ]);

        $roles_query = Role::query()
            ->when(request()->has('name'),function($query){
                $query->where('name',request('name'));
            });

        $roles = request()->has('page') ? $roles_query->paginate() : $roles_query->get();

        return RoleResource::collection($roles);
    }

    public function show(Role $role){
        $role =  new RoleResource($role);
        return response()->json($role);
    }

    public function store(Request $request){
        // TODO Authorization only super
        $data = $request->validate([
            'name' => 'required|string|max:40'
        ]);

        $role = Role::create($data);
        return response()->json($role,Response::HTTP_CREATED);
    }
    public function update(Request $request, Role $role){
       
        // TODO Authorization only super
        $data = $request->validate([
            'name' => ['filled','string','max:40']
        ]);

        $role->update($data);

        return response()->json($data,Response::HTTP_CREATED);
    }

    public function destroy(Role $role){
        // TODO AUthorization only super
        $role->delete();
        return response()->json([],Response::HTTP_ACCEPTED);
    }
}
