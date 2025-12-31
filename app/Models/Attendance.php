<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\StudentProfile;
use App\Models\Classes;

class Attendance extends Model
{
     use HasFactory;

    protected $fillable = ['student_id','class_id','date','status'];

    public function student()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
