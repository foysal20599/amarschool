<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;
    protected $table= 'unions';
    public function upozilla(){
        return $this->belongsTo(Upozilla::class, 'upazilla_id', 'id');
    }

    protected $fillable = [
        'name',
        'upazilla_id',
    ];
}
