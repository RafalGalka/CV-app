<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolPOB extends Model
{
    protected $table = 'protocolPOB';
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
