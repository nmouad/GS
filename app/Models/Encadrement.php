<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Encadrement extends Model
{
    protected $table = 'encadrements';

    use HasFactory;

    // public function students(): HasMany
    // {
    //     return $this->hasMany(Student::class);
    // }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
