<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'id','month','year','ammount',
        'status','student_id','membershiptype_id','enabled'
    ];

    //un Membership pertenece a un Membershiptype
    public function membershiptype()
    {
        return $this->belongsTo(Membershiptype::class);
    }

    //un Membership pertenece a un Student
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
