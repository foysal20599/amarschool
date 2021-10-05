<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_path', 'status', 'video_status', 'class_id', 'user_id',
    ];

    public function student() {
        return $this->belongsTo(Student::class,'class_id','class_id');
    }
}
