<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "public_area",
        "number",
        "district",
        "complement",
        "cep",
        "city",
        "user_id",
        "state_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }
}
