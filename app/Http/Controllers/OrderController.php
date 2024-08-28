<?php

namespace App\Http\Controllers;

use App\Domain\MasterData\Entities\Driver;
use App\Domain\MasterData\Entities\Store;
use App\Domain\Order\Application\OrderManagement;
use App\Domain\Order\Data\OrderRepository;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Validator\OrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $repository;
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request) {}

    public function store(OrderRequest $request, OrderManagement $orderManagement)
    {
        $order = Order::create($orderManagement->getData($request));

        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($order)
            : redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $order = $this->repository->findById($id);
        $stores = Store::pluck('name', 'id');
        $drivers = Driver::pluck('name', 'id');

        return $request->ajax() || $request->wantsJson()
            ?  $this->apiResponseSuccess($order)
            : view('public.form-order', compact('order', 'stores', 'drivers'));
    }

    public function driverOrderEdit(Request $request, $order_id)
    {
        $driverOrder = $this->repository->findById($order_id);
        $stores = Store::pluck('name', 'id');
        $drivers = Driver::pluck('name', 'id');

        return $request->ajax() || $request->wantsJson()
            ?  $this->apiResponseSuccess($driverOrder)
            : view('public.driver-order', compact('driverOrder', 'stores', 'drivers'));
    }

    public function update(OrderRequest $request, OrderManagement $orderManagement, $id)
    {
        $order = $orderManagement->getUpdate($request, $id);

        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($order)
            : redirect()->back();
    }

    public function updateDriver(OrderRequest $request, OrderManagement $orderManagement, $order_id)
    {
        $order = $orderManagement->getUpdateDriver($request, $order_id);

        return $request->ajax() || $request->wantsJson()
            ? $this->apiResponseSuccess($order)
            : redirect()->back();
    }
}
