<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table= "companies";
    protected $fillable =[
        'id',
        'nama',
        'email',
        'logo',
        'website'
    ];
    public $incrementing = false;
    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
