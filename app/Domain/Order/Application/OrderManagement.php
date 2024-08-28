<?php

namespace App\Domain\Order\Application;

use App\Domain\Order\Entities\Order;

class OrderManagement
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getData($request)
    {
        return [
            'car_name'      => $request->car_name,
            'plate_number'  => $request->plate_number,
            'color'         => $request->color,
            'category'      => $request->category,
            'condition'     => $request->condition,
            'memo'          => $request->memo,
            'date_order'    => $request->date_order,
            'PIC_1'         => $request->PIC_1,
            'PIC_2'         => $request->PIC_2,
            'store_id_1'    => $request->store_id_1,
            'store_id_2'    => $request->store_id_2,
        ];
    }

    public function getUpdate($request, $id)
    {
        $order = $this->model->findOrFail($id);

        $order->update([
            'car_name'      => $request->car_name,
            'plate_number'  => $request->plate_number,
            'color'         => $request->color,
            'category'      => $request->category,
            'condition'     => $request->condition,
            'memo'          => $request->memo,
            'date_order'    => $request->date_order,
            'PIC_1'         => $request->PIC_1,
            'PIC_2'         => $request->PIC_2,
            'store_id_1'    => $request->store_id_1,
            'store_id_2'    => $request->store_id_2,
            'date_confirm'  => $request->date_confirm,
            'time_confirm'  => $request->time_confirm,
            'towing'        => $request->towing,
            'is_confirm'    => 1,
            'driver_id'     => $request->driver_id
        ]);

        return $order;
    }

    public function getUpdateDriver($request, $order_id)
    {
        $order = $this->model->findOrFail($order_id);

        $order->update([
            'car_name'      => $request->car_name,
            'plate_number'  => $request->plate_number,
            'color'         => $request->color,
            'category'      => $request->category,
            'condition'     => $request->condition,
            'memo'          => $request->memo,
            'date_order'    => $request->date_order,
            'PIC_1'         => $request->PIC_1,
            'PIC_2'         => $request->PIC_2,
            'store_id_1'    => $request->store_id_1,
            'store_id_2'    => $request->store_id_2,
            'date_confirm'  => $request->date_confirm,
            'time_confirm'  => $request->time_confirm,
            'towing'        => $request->towing,
            'is_confirm'    => 1,
            'is_done'       => 1,
            'driver_id'     => $request->driver_id
        ]);

        return $order;
    }
}
