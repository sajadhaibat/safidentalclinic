<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabratoryRecord extends Model
{
    protected $fillable = ['teeth','outpot','teeth_number','color','type','price','patient_id','labratory_id','company'];
    //
    public function patient(){

        return $this->belongsTo(Patient::class);

    }

    public function labratory(){

        return $this->belongsTo(Labratory::class);

    }
}
