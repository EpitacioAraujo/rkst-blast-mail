<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaings extends Model
{
    /**
     * @use HasFactory<\Database\Factories\CampaingsFactory>
     * @use SoftDeletes<\Illuminate\Database\Eloquent\SoftDeletes>
     * */
    use HasFactory, SoftDeletes;
}
