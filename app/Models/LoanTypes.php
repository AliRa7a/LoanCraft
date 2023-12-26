<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTypes extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function loan_application()
    {
        return $this->hasMany(LoanApplication::class);
    }
}
