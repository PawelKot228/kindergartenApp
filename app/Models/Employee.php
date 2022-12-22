<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'contract_start_date' => 'date',
        'birthday' => 'date',
    ];

    public function duties(): BelongsToMany
    {
        return $this->belongsToMany(Duty::class, 'employee_duty');
    }
}
