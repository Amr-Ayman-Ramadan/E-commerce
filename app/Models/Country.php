<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    protected $fillable = ["name","phone_code","is_active","flag_code"];

    public $translatable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function governorates()
    {
        return $this->hasMany(Governorate::class);
    }

}
