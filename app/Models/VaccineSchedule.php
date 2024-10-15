<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vaccine_center_id',
        'vaccination_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class, 'vaccine_center_id', 'id');
    }
}
