<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function releases()
    {
        return $this->hasMany('App\Release');
    }
}
