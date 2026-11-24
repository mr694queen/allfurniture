<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public static function get(string $key, $default = null)
    {
        try {
            return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
                $setting = static::where('key', $key)->first();
                return $setting ? $setting->value : $default;
            });
        } catch (\Throwable $e) {
            // Cache unavailable — query directly
            $setting = static::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        }
    }

    public static function set(string $key, $value)
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        try {
            Cache::forget("setting_{$key}");
        } catch (\Throwable $e) {
            logger()->warning("Cache forget failed for setting_{$key}: " . $e->getMessage());
        }
        return true;
    }

    public static function setMany(array $settings)
    {
        foreach ($settings as $key => $value) {
            static::set($key, $value);
        }
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group)->orderBy('sort_order')->orderBy('key');
    }

    public static function byGroup(string $group)
    {
        return static::where('group', $group)->orderBy('sort_order')->orderBy('key')->get();
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('key');
    }
}
