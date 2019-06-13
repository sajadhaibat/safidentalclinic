<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labratory extends Model
{
    //
    public function labratoryrecords(){

        return $this->hasMany(LabratoryRecord::class);
    }
    public function laboratorypayments(){

        return $this->hasMany(LaboratoryPayment::class);
    }
}
