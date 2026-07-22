<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
public function stocks()
{
    return $this->hasMany(Stock::class);
}
 



   protected $table = 'employees';
    protected $fillable = [
        'emp_id', 'emp_name','emp_faculty','emp_dep','emp_phone'
    ];
}
