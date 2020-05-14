<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentSection extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    protected $fillable = [
        'section_name', 'associated_dept', 'section_goal', 'reason_for_creation', 'department_id', 'sectional_head'
    ];
}
