<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $with =  ['departmentSection', 'position', 'department'];
    public function departmentSection()
    {
        return $this->belongsTo(DepartmentSection::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function expenditure()
    {
        return $this->belongsTo(Expenditure::class);
    }
    protected $fillable = [
        'surname', 'firstname', 'lastname', 'email',
        'password', 'address', 'staff_id', 'gender',
        'profile_pic', 'position', 'department_section_id',
        'position_id', 'department_id',
    ];
}
