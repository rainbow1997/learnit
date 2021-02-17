<?php


namespace App\Attachment;
use App\Attachment;
use Illuminate\Database\Eloquent\Model as Model;


class ImageAttachment extends Attachment
{
    protected $table='image_attachment';
    public function attachment()
    {
        return $this->morphOne('App\Attachment\Attachment');
    }
}
