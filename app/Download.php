<?php

class Download extends Eloquent
{
    protected $table    = 'downloads';
    protected $fillable = array('code', 'filename');

    public function artist()
    {
        return $this->belongsTo('Artist');
    }

    public function release()
    {
        return $this->belongsTo('Release');
    }

    public function downloadGroup()
    {
        return $this->belongsTo('DownloadGroup');
    }
}
