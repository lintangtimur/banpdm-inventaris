<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $fillable = ["name"];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
