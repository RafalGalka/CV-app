<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchType extends Model
{
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(ProtocolOther::class, 'test_type');
    }
    use HasFactory;
}
