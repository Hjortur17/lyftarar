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
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
