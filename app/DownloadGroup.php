<?php

class DownloadGroup extends Eloquent
{
    protected $table    = 'downloadGroups';
    protected $fillable = array('title');

    public function release()
    {
        return $this->hasOne('Release');
    }

    public function artist()
    {
        return $this->hasOne('Artist');
    }

    public function downloads()
    {
        return $this->hasMany('Download');
    }
}
