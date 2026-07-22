<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addinfo extends Model
{
    protected $table = 'addinfo';
    protected $fillable = [
        'name', 'position','file_type','item','in_qty','in_cost','out_qty','out_cost'
    ];
}
