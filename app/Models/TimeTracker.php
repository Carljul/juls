<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTracker extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'time_tracker';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'time_in',
        'morning_break_in',
        'morning_break_out',
        'lunch_break_in',
        'lunch_break_out',
        'afternoon_break_in',
        'afternoon_break_out',
        'bio_break_in',
        'bio_break_out',
        'dinner_break_in',
        'dinner_break_out',
        'night_break_in',
        'night_break_out',
        'dawn_break_in',
        'dawn_break_out',
        'time_out',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'time_in' => 'datetime',
        'morning_break_in' => 'datetime',
        'morning_break_out' => 'datetime',
        'lunch_break_in' => 'datetime',
        'lunch_break_out' => 'datetime',
        'afternoon_break_in' => 'datetime',
        'afternoon_break_out' => 'datetime',
        'bio_break_in' => 'datetime',
        'bio_break_out' => 'datetime',
        'dinner_break_in' => 'datetime',
        'dinner_break_out' => 'datetime',
        'night_break_in' => 'datetime',
        'night_break_out' => 'datetime',
        'dawn_break_in' => 'datetime',
        'dawn_break_out' => 'datetime',
        'time_out' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
