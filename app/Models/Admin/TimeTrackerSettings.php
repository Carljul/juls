<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTrackerSettings extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'time_tracker_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'morning_break',
        'morning_time',
        'lunch_break',
        'lunch_time',
        'afternoon_break',
        'afternoon_time',
        'bio_break',
        'bio_time',
        'dinner_break',
        'dinner_time',
        'night_break',
        'night_time',
        'dawn_break',
        'dawn_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
