<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'emp_id',
        'emp_name',
        'emp_faculty',
        'emp_dep',
        'emp_position',
        'emp_position_code',
        'emp_phone',
        'status',
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function assetAssignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }

    public function stocks()
    {
        return $this->hasMany(stock::class);
    }
}
