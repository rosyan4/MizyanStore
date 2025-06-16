<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    public static function getValue($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        if ($setting->type === 'boolean') {
            return $setting->value === '1' || $setting->value === 'true';
        }

        return $setting->value;
    }

    public static function setValue($key, $value, $type = 'text', $group = 'general')
    {
        $setting = self::where('key', $key)->first();
        
        if (!$setting) {
            return self::create([
                'key' => $key,
                'value' => $value,
                'type' => $type,
                'group' => $group,
            ]);
        }

        $setting->value = $value;
        $setting->save();
        
        return $setting;
    }
}