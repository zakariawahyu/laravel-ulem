<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['couple_type', 'name', 'parent_description', 'father_name', 'mother_name', 'image', 'instagram_url'];
}
