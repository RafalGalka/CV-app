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
        return $this->hasOne(ProtocolNumber::class);
    }

    public function invest()
    {
        return $this->belongsTo(Invest::class);
    }
}
