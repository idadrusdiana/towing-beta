<?php

namespace App\Domain\MasterData\Entities;

use App\Domain\Order\Entities\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = "stores";
    protected $fillable =
    [
        "name",
        "group_id"
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'store_id_1', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
