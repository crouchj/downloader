<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Release extends Model
{
    public function artist()
    {
        return $this->belongsTo('App\Release');
    }
}
