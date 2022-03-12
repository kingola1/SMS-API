<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * used to verify if is a head teacher
     * and so will have additional privilege
     *
     * @return boolean
     */
    public function isHeadteacher()
    {
        return (bool)$this->head;
    }
}
