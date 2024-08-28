<?php

namespace App\Http\Controllers;

use App\Domain\Order\Data\OrderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderRepository;
    protected $storeRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        return view('public.home');
    }

    public function OrderList($store_id, Request $request)
    {
        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($this->orderRepository->orderList($store_id))
            : view('public.car-list', $this->orderRepository->orderList($store_id));
    }

    public function driverOrder($driver_id, Request $request)
    {
        $driverOrders = $this->orderRepository->driverOrder($driver_id);

        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($this->orderRepository->driverOrder($driver_id))
            : view('public.driver-order', compact('driverOrders'));
    }

    public function storeHistory($store_id, Request $request)
    {
        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($this->orderRepository->storeHistory($store_id, $request))
            : view('public.car-list', $this->orderRepository->storeHistory($store_id, $request));
    }
}
