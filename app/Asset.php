<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_tag',
        'name',
        'category',
        'description',
        'serial_number',
        'purchase_date',
        'purchase_cost',
        'status',
        'employee_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }
}
