<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTypes extends Model
{
    use HasFactory;

    // Guarded attributes to prevent mass assignment
    protected $guarded = [];

    /**
     * Define a one-to-many relationship with LoanApplication model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loan_application()
    {
        return $this->hasMany(LoanApplication::class);
    }
}
