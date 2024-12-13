<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    public function informatika(): HasMany
    {
        return $this->hasMany(Student::class)->where('department_id', 3);
    }

    public function student(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            Lecturer::class,
            'department_id', // FK dati lecturers
            'nidn', // FK table students
            'id', // PK dari tablle department
            'nidn' // PK table lecturers
        );
    }
}
