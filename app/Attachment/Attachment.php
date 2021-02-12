<?php


namespace App\Attachment;

use Illuminate\Database\Eloquent\Model as Model;

class Attachment extends Model
{
    protected $fillable=['describe','file','size','status']; //size be tablesh ezafe she badan
    public function attachmentable()
    {
        return $this->morphTo();
    }
    public function imagequestionoption()
    {
        return $this->hasOne('App\QBank\ImageQuestionOption');
    }
    public function pdfquestionoption()
    {
        return $this->hasOne('App\QBank\PdfQuestionOption');

    }

}
