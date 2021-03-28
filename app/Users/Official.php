<?php
namespace App\Users;
use App\Users\OfficialUser;
use Illuminate\Database\Eloquent\Model as Model;
class Official extends Model
{
    protected $table='officials';


    public static function createByForm(OfficialUser $userObj) // badan ba interface eslah she
    {
        $instance=new self();
        $instance->setOfficialableIdAttribute($userObj->id);
        $instance->setOfficialableTypeAttribute(get_class($userObj));
        return $instance;
    }
    //for method overriding
//

    public function setOfficialableIdAttribute($id)
    {
        $this->attributes['officialable_id']=$id;
    }
    public function setOfficialableTypeAttribute($type)
    {
        $this->attributes['officialable_type']=$type;
    }
    //protected $fillable = [];
    public function user() //user be official
    {
        return $this->morphOne('App\Users\User','userable');
    }
    public function officialable() //official be teacher
    {
        return $this->morphTo();
    }

    public static function create(OfficialUser $userObj,array $regData)//$attributes hamoon sheyei az Teacher
    {
        $official=Official::createByForm($userObj);
        $official->save();
        $userObj->official()->save($official);
        return User::create($official,$regData);
    }
}
