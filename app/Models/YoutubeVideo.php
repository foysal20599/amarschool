<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_link',
        'video_title',
        'user_id',
        'class_id',
        'status',
    ];
    public function student() {
        return $this->belongsTo(Student::class,'class_id','class_id');
    }
}
