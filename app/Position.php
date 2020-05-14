<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name', 'supposed_salary', 'job_description'
    ];

    public function getSupposedSalaryAttribute($value)
    {
        return number_format($value);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
