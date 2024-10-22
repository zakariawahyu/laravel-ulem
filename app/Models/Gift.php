<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['bank', 'account_name', 'account_number'];
}
