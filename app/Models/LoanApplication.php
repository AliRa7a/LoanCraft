<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    // Guarded attributes to prevent mass assignment
    protected $guarded = [];

    /**
     * Define a many-to-one relationship with LoanTypes model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loan_type()
    {
        return $this->belongsTo(LoanTypes::class);
    }
}
