<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    public function lecturer(): HasOne
    {
        return $this->hasOne(Lecturer::class, 'nidn', 'nidn');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'nidn', 'nidn');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
