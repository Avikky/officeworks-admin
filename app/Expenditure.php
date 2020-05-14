<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    protected $fillable = [
        'expense_type', 'description', 'amount'
    ];
}
