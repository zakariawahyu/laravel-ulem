<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'image', 'is_active', 'custom_data->keywords', 'custom_data->author', 'custom_data->icon', 'custom_data->date', 'custom_data->subtitle'];

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

    /**
     * The model's default values for attributes.
     *
     * @var array
    */
    protected $attributes = [
        'is_active' => false,
    ];
}
