<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForkliftClass extends Model
{
    use HasFactory;

    public function forklifts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Forklift::class, 'forklift_class_id')->orderByDesc('year');
    }
}
