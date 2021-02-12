<?php


namespace App\Attachment;
use App\Attachment;
use Illuminate\Database\Eloquent\Model as Model;


class SessionAttachment extends Model
{
    public function attachments()
    {
        return $this->morphMany(Attachment::class);
    }
}
