<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forklift extends Model
{
    use HasFactory;

    /**
     * Get the services for the Forklifts.
     */
    public function services(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function forklift_classes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ForkliftClass::class, 'id');
    }

    public function forklifts_equipment(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'forklift_equipment');
    }
}
