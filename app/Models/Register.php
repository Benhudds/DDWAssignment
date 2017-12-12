<?php

namespace App\Models;

class Register {
    protected $guarded = array();
    protected $table = 'users';

    public static function saveFormData($data)
    {
        DB::table('users')->insert($data);
    }
}