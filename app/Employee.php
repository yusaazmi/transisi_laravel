<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable=[
        "id",
        "nama",
        "company",
        "email"
    ];

    public $incrementing = false;
    public function companies(){
        return $this->belongsToMany('App\Company');
    }
}
