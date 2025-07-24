<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ItemTransaction extends Model
{
    public $fillable = ["item_id",'transaction_type','qty','transaction_date','source','note','created_by'];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
