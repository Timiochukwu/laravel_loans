<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanApplication extends Model
{
    use HasFactory;
    // protected $guarded = [];

    public function loanType(){
        return $this->belongsTo(LoanTypes::class);

    }
}
