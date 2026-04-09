<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'wedding_date' => 'date',
        'akad_date' => 'date',
        'reception_date' => 'date',
        'love_story' => 'array',
        'gallery' => 'array',
        'digital_gifts' => 'array',
        'is_published' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function rsvps()
    {
        return $this->hasMany(RSVP::class);
    }
}
