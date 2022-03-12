<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Exam extends Model
{
    use HasFactory;

    /**
     * Constants to represent Term
     */
    public const FIRST_TERM = 1;
    public const SECOND_TERM = 2;
    public const THIRD_TERM = 3;

    /**
     * A Map of terms to their string value
     */
    protected static $term_map = [

        self::FIRST_TERM => 'First term',
        self::SECOND_TERM => 'Second term',
        self::THIRD_TERM => 'Third term'

    ];

    public function session(){
        return $this->belongsTo(Session::class);
    }

    /**
     * get the published state of the Exam
     *
     * @return boolean
     */
    public function isPublished(){
        return (bool) $this->published;
    }

    /**
     * Get string value of term
     *
     * @param integer $term
     * @return void
     */
    public static function getTermString(int $term){

        if(empty($term) || !isset(self::$term_map[$term])){
            throw new Exception('Invalid Term Provided');
        }

        return self::$term_map[$term];
    }
}
