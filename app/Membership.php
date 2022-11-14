<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    public function membershiptype()
    {
        return $this->belongsTo(Membershiptype::class);
    }

}
