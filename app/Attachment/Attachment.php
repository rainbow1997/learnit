<?php


namespace App\Attachment;

use Illuminate\Database\Eloquent\Model as Model;
/*
 * oomadim Attachmento be shekl system file darnazar gereftim va dg be session inha joda nakardim
 */
class Attachment extends Model
{
    protected $table='attachments';
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
    public function sessions()
    {
        return $this->belongsToMany('App\Session\Session');
    }

}
