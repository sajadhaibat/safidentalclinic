<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DialyExpense extends Model
{
    //
    public function staff(){

        return $this->belongsTo(Staff::class);

    }
}
