<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps = false;
    protected $table = 'sizes';
    use HasFactory;

    public function sample()
    {
        return $this->hasOne(WSTest::class, 'id', 'sample_id');
    }
}
