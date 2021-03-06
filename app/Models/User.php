<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public const USER_STATUS_ACTIVE = 1;
    public const USER_STATUS_SUSPENDED = 2;
    public const USER_STATUS_INACTIVE = 3;

    /**
     * User Abilities Definition
     */

     public const USER_ABILITIES_SUPER = 'act-as-super';
     public const USER_ABILITIES_ADMIN = 'act-as-admin';
     public const USER_ABILITIES_TEACHER = 'act-as-teacher';
     public const USER_ABILITIES_STUDENT = 'act-as-student';

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function isSuper(){
        return Role::find($this->role_id)->name == 'super' ? true : false;
    }

    public function isAdmin(){
        $role = Role::find($this->role_id)->name;
        return $role == 'admin' || $role == 'super' ? true : false;
    }

    public function isTeacher(){
        return Role::find($this->role_id)->name == 'teacher'? true : false;
    }

    public function isStudent(){
        return Role::find($this->role_id)->name == 'student'? true : false;
    }
}
