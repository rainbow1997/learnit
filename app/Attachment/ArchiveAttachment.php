<?php


namespace App\Attachment;


class ArchiveAttachment extends Attachment
{
    protected $table='archive_attachment';
    protected $fillable=['format'];

    public function attachment()
    {
        return $this->morphOne('App\Attachment\Attachment');
    }

}
