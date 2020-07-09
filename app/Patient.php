<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //

    public function medical()
    {
        return $this->hasOne('App\Medical','patient_id');
    }
}
