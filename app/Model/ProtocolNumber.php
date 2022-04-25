<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolNumber extends Model
{
  protected $table = 'protocols';
  public $timestamps = false;
  use HasFactory;
}
