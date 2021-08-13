<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacherName',
        'phoneNumber',
        'course_id',
        'department_id',
       // 'created_by',
    ];
    public function courses()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
    public function departments()
    {
        return $this->belongsTo(Departments::class,'department_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User', 'created_by', 'id');
    // }
}

