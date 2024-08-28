<?php

namespace App\Domain\Order\Entities;

use App\Domain\MasterData\Entities\Driver;
use App\Domain\MasterData\Entities\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "car_name",
        "plate_number",
        "color",
        "category",
        "condition",
        "memo",
        "date_order",
        "time",
        "PIC_1",
        "PIC_2",
        "date_confirm",
        "time_confirm",
        "towing",
        "is_confirm",
        "is_done",
        "driver_id",
        "store_id_1",
        "store_id_2",
    ];

    public function stores()
    {
        return $this->belongsTo(Store::class);
    }

    public function drivers()
    {
        return $this->belongsTo(Driver::class);
    }
}
