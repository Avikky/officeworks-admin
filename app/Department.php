<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
//    protected  $table = 'departments';
    protected $with =  ['sections'];
    public function sections()
    {
        return $this->hasMany('App\DepartmentSection');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
        protected $fillable = [
        'department_name', 'department_HOD', 'department_rules', 'department_sections'
    ];

}
