<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NavigationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'url',
        'target',
        'sort_order',
        'is_active',
        'is_external',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_external' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }
}
