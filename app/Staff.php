<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    public function dialyexpenses(){

        return $this->hasMany(DialyExpense::class);
    }
    public function materials(){

        return $this->hasMany(Material::class);
    }
    public function salaries(){

        return $this->hasMany(Salary::class);
    }
}
