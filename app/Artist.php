<?php

class Artist extends Eloquent
{
    protected $table    = 'artists';
    protected $fillable    = array('name');

    public function releases()
    {
        return $this->hasMany('Release');
    }

    public function release()
    {
        return $this->belongsTo('Release');
    }
}
