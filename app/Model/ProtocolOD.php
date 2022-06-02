<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolOD extends Model
{
    protected $table = 'protocolOD';
    use HasFactory;

    public function protocolNumber()
    {
        return $this->hasOne(ProtocolNumber::class, 'protocol_number', 'protocol_number');
    }

    public function invest()
    {
        return $this->belongsTo(Invest::class);
    }
}
