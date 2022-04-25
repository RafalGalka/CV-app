<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    protected $table = 'investments';
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }

    public function investIde()
    {
        return $this->hasMany(ProtocolOther::class);
    }

    public function scopeSorting(Builder $query): Builder
    {
        return $query
            ->with('client');
    }
}
