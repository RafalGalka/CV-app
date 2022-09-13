<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProtocolNumber extends Model
{
    protected $table = 'protocols';
    use HasFactory;

    public function samples()
    {
        return $this->hasMany(Sample::class, 'protocol_number', 'protocol_number');
    }
}
