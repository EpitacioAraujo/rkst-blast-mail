<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }
}
