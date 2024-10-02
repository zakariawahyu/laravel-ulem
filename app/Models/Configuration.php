<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'image', 'custom_data->keywords', 'custom_data->author', 'custom_data->icon', 'custom_data->date'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'custom_data' => AsArrayObject::class,
        ];
    }
}
