<?php

class Card extends Eloquent
{
    protected $table    = 'cards';
    protected $fillable    = array('title');

    public function cardLayout()
    {
        return $this->hasOne('CardLayout');
    }

    public function artist()
    {
        return $this->hasOne('Artist');
    }

    public function release()
    {
        return $this->hasOne('Release');
    }
}
