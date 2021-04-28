<?php


namespace App\Homework;

use App\Attachment\Attachment;
use Illuminate\Database\Eloquent\Model as Model;

class HomeworkAnswer extends Model
{
    public $fillable=['text_description'];
    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }
    public function attachments()
    {
        return $this->belongsToMany(Attachment::class);
    }
}
