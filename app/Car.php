<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'cars';
    protected $fillable = array('make','model','rented','created_at_ip','updated_at_ip');
}