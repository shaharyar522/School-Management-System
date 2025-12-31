<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id',
        'roll_no',
        'dob',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
