<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSectionSession extends Model
{
    use HasFactory;
    
    protected $table = 'students_sections_sessions'; 

    protected $fillable = ['student_id','section_id','session_id'];

    
}
