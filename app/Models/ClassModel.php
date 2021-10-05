<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_name', 'status',
    ];
    public function upload(){
        return $this->hasMany(Upload::class, 'class_id', 'id');
    }
}
