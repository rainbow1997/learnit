<?php


namespace App\Attachment;


class PdfAttachment extends Attachment
{
    protected $table=['pdf_attachment'];
    protected $fillable=['pagesCount'];
    public function attachment()
    {
        return $this->morphOne('App\Attachment\Attachment');

    }

}
