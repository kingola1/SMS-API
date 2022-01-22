<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(){
        request()->validate([
            'role_id' => 'filled|exists:roles,id'
        ]);

        $users_query = User::query()
            ->when(request()->has('role_id'),function($query){
                $query->where('role_id',request('role_id'));
            })
            ->when(request()->has('order'), function($query){
                $query->orderBy(request('order'), request('direction','DESC'));
            });

        $users = request()->has('page') ? $users_query->paginate() : $users_query->get();

        return $users;
    }

    public function show(User $users){
        return response()->json($users);
    }


}
