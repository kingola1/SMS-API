<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * Map of acceptable types
     *
     * @var array
     */
    protected $type_map = [
        'text' => 'Single Line Text',
        'textarea' => 'Multi Line Text',
        'integer' => 'Numeric',
        'date' => 'Date',
        'date-time' => 'Date - Time',
        'select' => 'Dropdown',
    ];


    public static function getSetting($key){
        // 
    }

    public static function setSetting($key, $value){
        // 
    }

    /**
     * checks if the key and value is a match
     *
     * @param [type] $key
     * @param [type] $value
     * @return boolean
     */
    public static function validateSetting($key, $value){
        // 
    }
}
