<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TeacherProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'qualification',
        'phone',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
