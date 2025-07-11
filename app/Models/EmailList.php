<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailList extends Model
{
    /**
     *  @use HasFactory<\Database\Factories\EmailListFactory>
     *  @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes>
    */
    use HasFactory, SoftDeletes;

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
