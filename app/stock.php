<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
public function employee()
{

    return $this->belongsTo(Employee::class);

}
     protected $table = 'stocks';
    protected $fillable = [
        'item_name', 'item_quantity','item_detail','item_cost','item_dep'
    ];


}
