<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    /**
     * returns the value of the combined column
     * used to verify if a class is combined
     * and so will have only one section
     *
     * @return boolean
     */
    public function is_combined()
    {
        return (bool)$this->combined;
    }

}
