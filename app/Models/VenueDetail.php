<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VenueDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'location', 'address', 'date', 'map'];
}
