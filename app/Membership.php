<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'id','month','year','ammount',
        'status','student_id','membershiptype_id','enabled'
    ];

    public function membershiptype()
    {
        return $this->belongsTo(Membershiptype::class);
    }

}
