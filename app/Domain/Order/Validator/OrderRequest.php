<?php

namespace App\Domain\Order\Validator;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name',
            'plate_number',
            'color',
            'category',
            'condition',
            'memo',
            'date_order',
            'PIC_1',
            'PIC_2',
            'store_id_1',
            'store_id_2',
        ];
    }
}
