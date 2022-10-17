<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WSTest extends Model
{
    public $timestamps = false;
    protected $table = 'WSTests';
    use HasFactory;
}
