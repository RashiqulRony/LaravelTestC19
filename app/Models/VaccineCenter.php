<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'daily_limit',
    ];

    public function schedules()
    {
        return $this->hasMany(VaccineSchedule::class, 'vaccine_center_id', 'id');
    }
}
