<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function appointments(){

        return $this->hasMany(Appointment::class);
    }

    public function labratoryrecords(){

        return $this->hasMany(LabratoryRecord::class);
    }
    public function patient_payments(){

        return $this->hasMany(Patient_Payment::class);
    }

}
