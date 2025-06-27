<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    protected $fillable = ["role", "permissions"];
    public $translatable = ["role"];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function getPermissionsAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            $cleaned = trim($value, '"');
            $decoded = json_decode($cleaned, true);
            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }

    public function admins()
    {
        $this->hasMany(Admin::class, 'role_id');
    }
}
