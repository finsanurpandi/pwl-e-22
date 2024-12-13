<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\DepartmentEnum;
use App\ActiveStatusEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory;

    // protected $table = 'dosen';

    // protected $primaryKey = 'nidn';

    // protected $incrementing = false;

    protected $attributes = [
        'is_active' => 1,
    ];

    protected $casts = [
        'is_active' => ActiveStatusEnum::class,
        'department_id' => DepartmentEnum::class
    ];

    protected $fillable = [
        'nidn',
        'firstname',
        'last_name',
        'department_id'
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->firstname." ".$this->last_name
        );
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'nidn', 'nidn')->orderBy('fullname', 'DESC');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'nidn', 'nidn');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
