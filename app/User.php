<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function getAccessLevel($id)
    {
        $user = User::find($id);
        return $user->access_level;
    }
}
