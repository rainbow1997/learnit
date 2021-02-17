<?php


namespace App\Attachment;

use Illuminate\Database\Eloquent\Model as Model;

class MovieAttachment extends Attachment
{
    protected $table=['movie_attachment'];
    protected $fillable=['timeDuration'];
    public function attachment()
    {
        return $this->morphOne('App\Attachment\Attachment');
    }

}
