<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ItemTransaction;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function itemTransactions()
    {
        return $this->hasMany(ItemTransaction::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
