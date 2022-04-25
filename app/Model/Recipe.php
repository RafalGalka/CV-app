<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function invest()
    {
        return $this->belongsTo(Invest::class, 'investment_id');
    }
    use HasFactory;
}
