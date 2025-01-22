<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    protected $table = 'personal_record';

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }
}
