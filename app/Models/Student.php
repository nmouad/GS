<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $table = 'students';

    use HasFactory;

    public function field(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }

    // public function encadrement(): BelongsTo
    // {
    //     return $this->belongsTo(Encadrement::class);
    // }

    public function encadrements(): BelongsToMany
    {
        return $this->belongsToMany(Encadrement::class);
    }


    public function getPeriodAttribute()
    {
        if ($this->start_date && $this->end_date) {
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            return $end->diffInMonths($start);
        } else {
            return null;
        }
    }
}
