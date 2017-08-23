<?php
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Release extends Eloquent implements StaplerableInterface
{
    use EloquentTrait;

    protected $table    = 'releases';
    protected $fillable    = array('title', 'release_number', 'release_date', 'album_cover');

    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('album_cover');

        parent::__construct($attributes);
    }

    public function artist()
    {
        return $this->belongsTo('Artist')->orderBy('name');
    }

    public function downloads()
    {
        return $this->hasMany('Download');
    }

    public function downloadGroups()
    {
        return $this->hasMany('DownloadGroup');
    }
}
