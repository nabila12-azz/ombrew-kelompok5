<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    protected $fillable = ['key', 'value'];

    // Helper: ambil value by key
    public static function get(string $key, string $default = ''): string {
        $s = static::where('key', $key)->first();
        return $s ? $s->value : $default;
    }
}