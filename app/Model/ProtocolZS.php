<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolZS extends Model
{
    protected $table = 'protocolZS';
    use HasFactory;

    public function protocolNumber()
    {
        return $this->hasOne(ProtocolNumber::class, 'protocol_number', 'protocol_number');
    }

    public function invest()
    {
        return $this->belongsTo(Invest::class);
    }

    public function class()
    {
        return $this->belongsTo(StrenghtClass::class, 'compression_class');
    }

    public function classBending()
    {
        return $this->belongsTo(StrenghtClass::class, 'bending_class');
    }
}
