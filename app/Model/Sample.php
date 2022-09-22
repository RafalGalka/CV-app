<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function protocol()
    {
        return $this->belongsTo(ProtocolNumber::class, 'protocol_number', 'protocol_number');
    }

    public function class()
    {
        return $this->belongsTo(StrenghtClass::class, 'compression_class');
    }
}
