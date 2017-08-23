<?php

class CardLayout extends Eloquent
{
    protected $table    = 'cardLayouts';
    protected $fillable    = array('title', 'markup');

    public function fields()
    {
        return $this->hasMany('CardLayoutField');
    }
}
