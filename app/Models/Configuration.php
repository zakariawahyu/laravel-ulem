<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'image', 'custom_data->keywords', 'custom_data->author', 'custom_data->icon'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'custom_data' => 'array',
        ];
    }
}
