<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $role_map = [
        'super' => 'super',
        'admin' => 'admin',
        'principal' => 'admin',
        'teacher' => 'teacher',
        'student' => 'student',
    ];

    public function user(){
        $this->hasMany(User::class);
    }
}
