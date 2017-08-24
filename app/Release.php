<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    public function artist()
    {
        return $this->belongsTo('App\Release');
    }
}
