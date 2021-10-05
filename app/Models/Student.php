<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name', 'status', 'class_id', 'date_of_birth', 'father_name', 'mother_name', 'address', 'image', 'phone_no', 'religion', 'gender', 'is_active',
    ];
   public function classname(){
    return $this->belongsTo(ClassModel::class, 'class_id', 'id');
   }
   public function union(){
       return $this->belongsTo(Union::class, 'union_id', 'id');
   }
   public function agent(){
       return $this->belongsTo(User::class, 'agent_id', 'id')->select('id', 'name');
   }
}
