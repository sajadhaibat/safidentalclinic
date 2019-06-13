<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Payment extends Model
{
    //
    public function patient(){

        return $this->belongsTo(Patient::class);

    }
}
