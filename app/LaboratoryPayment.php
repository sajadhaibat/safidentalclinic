<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaboratoryPayment extends Model
{
    //
    public function labratory(){

        return $this->belongsTo(Labratory::class);

    }
}
